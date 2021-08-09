<?php

namespace App\Http\Controllers\Events;

use App\Models\Events\ExtraForm;
use App\Models\Users\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Events\Event;
use App\Models\Events\Team;
use App\Models\Events\TeamMember;
use App\Models\Events\TeamCategory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Password;
use Image;
use File;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Users\Occupation;
use App\Models\Users\ShirtSize;
use App\Models\Users\UsersTeamRole;
use App\Mail\InviteMember;
use Illuminate\Support\Facades\Mail;
use App\Models\Hackaton\Team as HackTeam;
use App\Models\Hackaton\Category as HackCategory;
use App\Models\Hackaton\Occupation as HackOccupation;
use App\Models\Hackaton\Technology as HackTechnology;
use App\Models\Hackaton\Tshirt as HackTshirt;
use App\Models\Hackaton\Member as HackMember;
use App\Mail\cwRegistered;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::with('Teams', 'Teams.Members', 'Teams.Members.User', 'Teams.Members.User.Occupation', 'Teams.Members.Role', 'Teams.Category')->where([
            ['to', '>', Carbon::now()->format('Y-m-d H:m:s')],
            ['visibility', '!=', 'draft'],
        ])->get();
        $pastEvents = Event::with('Teams', 'Teams.Members', 'Teams.Category')->where([
            ['to', '<', Carbon::now()->format('Y-m-d H:m:s')],
            ['visibility', '!=', 'draft'],
        ])->get();

        return view('layouts.events', ['events' => $events, 'pastEvents' => $pastEvents]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->min_team = (int)$request->min_team;
        $request->max_team = (int)$request->max_team;
        $request['valid_visibility'] = \Config::get('courseVisibility');
        $request['valid_type'] = ['is_team', 'is_module'];
        $data = $request->validate([
            'picture' => 'required|file|image|mimes:jpeg,png,gif,webp,ico,jpg|max:4000',
            'name' => 'required',
            'rules' => 'sometimes',
            'description' => 'required',
            'starts' => 'required|date_format:"Y-m-d\TH:i"',
            'ends' => 'required|date_format:"Y-m-d\TH:i"|after:starts',
            'type' => 'required|in_array:valid_type.*',
            'visibility' => 'required|in_array:valid_visibility.*',
            'min_team' => 'sometimes|required|numeric|min:1|max:99',
            'max_team' => 'sometimes|required|numeric|min:' . $request->min_team . '|max:99',
        ]);

        $eventPic = Input::file('picture');
        $image = Image::make($eventPic->getRealPath());
        $image->fit(800, 600, function ($constraint) {
            $constraint->upsize();
        });
        $name = time() . "_" . $eventPic->getClientOriginalName();
        $name = str_replace(' ', '', strtolower($name));
        $name = md5($name);
        $path = public_path() . '/images/events';

        if ($eventPic->getClientOriginalExtension() == 'gif') {
            copy($eventPic->getRealPath(), public_path() . '/images/events');
        } else {
            $image->save(public_path() . '/images/events/' . $name, 90);
        }

        $newEvent = new Event;
        $newEvent->name = $request->name;
        $newEvent->picture = $name;
        $newEvent->rules = $request->rules;
        $newEvent->description = $request->description;
        $newEvent->from = Carbon::parse($data['starts']);
        $newEvent->to = Carbon::parse($data['ends']);
        $newEvent->min_team = $request->min_team;
        $newEvent->max_team = $request->max_team;
        $newEvent->location = $request->location;
        if ($request->type == 'is_team') {
            $newEvent->is_team = '1';
            $newEvent->is_module = '0';
        } else {
            $newEvent->is_team = '0';
            $newEvent->is_module = '1';
        }
        $newEvent->visibility = $request->visibility;
        if ($request->event_type) {
            $newEvent->type = $request->event_type;
        }
        $newEvent->save();

        $message = __('Успешно създадено събитие ' . ucfirst($data['name']) . '!');
        return redirect()->route('admin.events')->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($event)
    {
        $applications = ExtraForm::where('event_id', $event)->with('User', 'User.Occupation', 'Event')->get();

        return view('events.show', ['applications' => $applications]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->min_team = (int)$request->min_team;
        $request->max_team = (int)$request->max_team;
        $event = Event::find($id);
        $request['valid_visibility'] = \Config::get('courseVisibility');
        $request['valid_type'] = ['is_team', 'is_module'];
        $data = $request->validate([
            'picture' => 'file|image|mimes:jpeg,png,gif,webp,ico,jpg|max:4000',
            'name' => 'required',
            'rules' => 'sometimes',
            'description' => 'required',
            'starts' => 'required|date_format:"Y-m-d\TH:i"',
            'ends' => 'required|date_format:"Y-m-d\TH:i"|after:starts',
            'type' => 'required|in_array:valid_type.*',
            'visibility' => 'required|in_array:valid_visibility.*',
            'min_team' => 'sometimes|numeric|min:1|max:99',
            'max_team' => 'sometimes|numeric|min:' . $request->min_team . '|max:99',
        ]);

        if (Input::file('picture')) {
            $eventPicRemove = public_path() . '/images/events/' . $event->picture;
            File::delete($eventPicRemove);
            $eventPic = Input::file('picture');
            $image = Image::make($eventPic->getRealPath());
            $image->fit(800, 600, function ($constraint) {
                $constraint->upsize();
            });
            $name = time() . "_" . $eventPic->getClientOriginalName();
            $name = str_replace(' ', '', strtolower($name));
            $name = md5($name);
            $path = public_path() . '/images/events';

            if ($eventPic->getClientOriginalExtension() == 'gif') {
                copy($eventPic->getRealPath(), public_path() . '/images/events');
            } else {
                $image->save(public_path() . '/images/events/' . $name, 90);
            }
            $event->picture = $name;
        }

        $event->name = $request->name;
        $event->rules = $request->rules;
        $event->description = $request->description;
        $event->from = Carbon::parse($data['starts']);
        $event->to = Carbon::parse($data['ends']);
        $event->location = $request->location;
        $event->min_team = $request->min_team;
        $event->max_team = $request->max_team;
        if ($request->type == 'is_team') {
            $event->is_team = '1';
            $event->is_module = '0';
        } else {
            $event->is_team = '0';
            $event->is_module = '1';
        }
        $event->visibility = $request->visibility;
        if ($request->event_type) {
            $event->type = $request->event_type;
        }
        $event->save();

        $message = __('Успешно направени промени по събитие ' . ucfirst($data['name']) . '!');
        return redirect()->route('admin.events')->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteEvent = Event::find($id);
        if (!is_null($deleteEvent->picture)) {
            $eventPic = public_path() . '/images/events/' . $deleteEvent->picture;
            File::delete($eventPic);
        }
        $deleteEvent->delete();

        $message = __('Успешно изтрито Събитие!');
        return redirect()->route('admin.events')->with('success', $message);
    }

    public function registerTeam(Event $event)
    {
        if (!Auth::user()->isConfirmedMember($event->id)) {
            $teamCategories = TeamCategory::all();
            $stacks = \Config::get('tehnologyStack');
            $user = User::find(Auth::user()->id);
            $occupations = Occupation::all();
            $sizes = ShirtSize::all();
            return view('events.teams-register', [
                'event' => $event,
                'categories' => $teamCategories,
                'stacks' => $stacks,
                'user' => $user,
                'occupations' => $occupations,
                'sizes' => $sizes
            ]);
        }
        $message = __('Вече сте записан за това събитие!');
        return redirect()->back()->with('error', $message);
    }

    public function storeTeam(Event $event, Request $request)
    {
        $user = User::find(Auth::user()->id);
        $data = $request->validate([
            'team_picture' => 'required|file|image|mimes:jpeg,png,gif,webp,ico,jpg|max:4000',
            'name' => 'required|max:20',
            'team_category' => 'required|numeric',
            'technologyStack' => 'required',
            'git' => 'required',
            'slogan' => 'required',
            'inspiration' => 'sometimes|max:200',
            'occupation' => 'required|numeric',
            'shirt_size' => 'required|numeric|',
            'invite_member_email.*' => 'sometimes|email',
        ]);
        $user->cl_occupation_id = $request->occupation;
        $user->save();

        $teamPic = Input::file('team_picture');
        $image = Image::make($teamPic->getRealPath());
        $image->fit(1024, 768, function ($constraint) {
            $constraint->upsize();
        });
        $picName = time() . "_" . $teamPic->getClientOriginalName();
        $picName = str_replace(' ', '', strtolower($picName));
        $picName = md5($picName);

        if ($teamPic->getClientOriginalExtension() == 'gif') {
            copy($coursePic->getRealPath(), public_path() . '/images/events/teams/' . $picName);
        } else {
            $image->save(public_path() . '/images/events/teams/' . $picName, 90);
        }

        $denyInvites = TeamMember::where('user_id', Auth::user()->id)->orWhere('email', Auth::user()->email)->first();
        if (!is_null($denyInvites)) {
            $denyInvites->confirmed = -1;
            $denyInvites->save();
        }

        //db hackaton
        $category = TeamCategory::select('category')->find($request->team_category);
        $hackCategoryFind = HackCategory::where('category', $category->category)->first();
        $hackCategory = $hackCategoryFind->category;
        $hackStackFind = HackTechnology::where('technology', $request->technologyStack)->first();
        $hackStack = $hackStackFind->technology;

        $hackTeam = new HackTeam;
        $hackTeam->team_name = $request->name;
        $hackTeam->category = $hackCategory;
        $hackTeam->technologies = $hackStack;
        $hackTeam->team_moto = $request->slogan;
        $hackTeam->inspiration = isset($request->inspiration) ? $request->inspiration : ' ';
        $hackTeam->is_confirmed = 0;
        $hackTeam->date_created = Carbon::now();
        $hackTeam->github_account = $request->git;
        $hackTeam->team_logo = $picName;
        $hackTeam->team_thumbnail = $picName;
        $hackTeam->project = '';
        $hackTeam->project_description = '';
        $hackTeam->save();

        if (isset($user->dob)) {
            $ageSum = (Carbon::now()->format('Y') - $user->dob->format('Y'));
        }
        $age = isset($ageSum) ? $ageSum : $request->userage;
        $occupation = Occupation::find($request->occupation);
        $hackOccupation = HackOccupation::firstOrCreate(['occupation' => $occupation->occupation]);
        $shirtSize = ShirtSize::find($request->shirt_size);
        $hackShirtSize = HackTshirt::firstOrCreate(['tshirt_size' => $shirtSize->size]);

        $hackMember = new HackMember;
        $hackMember->first_name = $user->name;
        $hackMember->last_name = $user->last_name;
        $hackMember->email = $user->email;
        $hackMember->age = isset($request->userage) ? $request->userage : $age;
        $hackMember->occupation = $hackOccupation->occupation;
        $hackMember->tshirt = $hackShirtSize->tshirt_size;
        $hackMember->team = $hackTeam->team_id;
        $hackMember->is_captain = 1;
        $hackMember->save();

        //db local
        $newTeam = new Team;
        $newTeam->events_id = $event->id;
        $newTeam->title = $request->name;
        $newTeam->picture = $picName;
        $newTeam->slogan = $request->slogan;
        $newTeam->event_team_category_id = $request->team_category;
        $newTeam->technology_stack = $request->technologyStack;
        $newTeam->inspiration = isset($request->inspiration) ? $request->inspiration : ' ';
        $newTeam->github = $request->git;
        $newTeam->is_active = 0;
        $newTeam->members_count = 1;
        $newTeam->hack_team_id = $hackTeam->team_id;
        $newTeam->save();

        $role = UsersTeamRole::where('role', 'капитан')->select('id')->first();
        $newMemberCapitan = new TeamMember;
        $newMemberCapitan->user_id = $user->id;
        $newMemberCapitan->cl_users_team_role_id = $role->id;
        $newMemberCapitan->cl_users_shirts_size_id = $request->shirt_size;
        $newMemberCapitan->event_team_id = $newTeam->id;
        $newMemberCapitan->confirmed = 1;
        $newMemberCapitan->save();

        if (!is_null($request->invite_member_email) && isset($request->invite_member_email)) {
            $isMemberExisting = User::whereIn('email', $request->invite_member_email)->get();
            $role = UsersTeamRole::where('role', 'участник')->select('id')->first();
            if (count($isMemberExisting) > 0) {
                foreach ($isMemberExisting as $key => $userExist) {
                    $newMember = new TeamMember;
                    $newMember->user_id = $userExist->id;
                    $newMember->cl_users_team_role_id = $role->id;
                    $newMember->event_team_id = $newTeam->id;
                    $newMember->confirmed = 0;
                    $newMember->save();
                    Mail::to($userExist->email)->send(new InviteMember($user, $newTeam, $event));
                }
            } else {
                foreach ($request->invite_member_email as $email) {
                    $newMember = new TeamMember;
                    $newMember->email = $email;
                    $newMember->cl_users_team_role_id = $role->id;
                    $newMember->event_team_id = $newTeam->id;
                    $newMember->confirmed = 0;
                    $newMember->save();
                    Mail::to($email)->send(new InviteMember($user, $newTeam, $event));
                }
            }
        }

        $message = __('Успешно създаден Отбор - ' . $request->name . '!');
        return redirect()->route('users.events')->with('success', $message);
    }

    public function inviteDeny($team)
    {
        $teamMember = TeamMember::where([
            ['event_team_id', $team],
            ['user_id', Auth::user()->id],
        ])->orWhere([
            ['event_team_id', $team],
            ['email', Auth::user()->email],
        ])->first();
        $teamMember->user_id = Auth::user()->id;
        $teamMember->email = Auth::user()->email;
        $teamMember->confirmed = -1;
        $teamMember->save();

        // $team = Team::find($team);
        // $team->members_count = ($team->members_count - 1);
        // $team->save();

        $message = __('Успешно отхвърлихте поканата за влизане в отбор!');
        return redirect()->route('users.events')->with('success', $message);
    }

    public function inviteAccept(Event $event, $team)
    {
        $team = Team::with('Members')->find($team);
        $teamMember = TeamMember::where([
            ['event_team_id', $team->id],
            ['user_id', Auth::user()->id],
        ])->orWhere([
            ['event_team_id', $team->id],
            ['email', Auth::user()->email],
        ])->first();
        $teamMember->user_id = Auth::user()->id;
        $teamMember->save();
        $user = User::find(Auth::user()->id);
        $occupations = Occupation::all();
        $sizes = ShirtSize::all();

        return view('events.team_join', [
            'teamMember' => $teamMember->id,
            'event' => $event,
            'team' => $team,
            'user' => $user,
            'sizes' => $sizes,
            'occupations' => $occupations
        ]);
    }

    public function confirmInvite(Request $request, Event $event, Team $team, TeamMember $teamMember)
    {
        $data = $request->validate([
            'occupation' => 'required|numeric',
            'shirt_size' => 'required|numeric',
            'userage' => 'required|numeric|min:7|max:100'
        ]);

        $year = Carbon::now()->subYears($request->userage)->format('Y');
        $year .= '-01-01';
        $dob = Carbon::parse($year)->format('Y-m-d');

        $user = User::find(Auth::user()->id);
        $user->cl_occupation_id = $request->occupation;
        $user->dob = $dob;
        $user->save();


        if ($team->members_count <= $event->max_team) {
            $teamMember->confirmed = 1;
            $teamMember->cl_users_shirts_size_id = $request->shirt_size;
            $teamMember->save();

            //hack db
            $age = (Carbon::now()->format('Y') - $user->dob->format('Y'));
            $occupation = Occupation::find($request->occupation);
            $hackOccupation = HackOccupation::firstOrCreate(['occupation' => $occupation->occupation]);
            $shirtSize = ShirtSize::find($request->shirt_size);
            $hackShirtSize = HackTshirt::firstOrCreate(['tshirt_size' => $shirtSize->size]);

            $hackTeam = HackTeam::where('team_id', $team->hack_team_id)->first();

            $newHackMember = new HackMember;
            $newHackMember->first_name = $user->name;
            $newHackMember->last_name = $user->last_name;
            $newHackMember->email = $user->email;
            $newHackMember->age = isset($request->userage) ? $request->userage : $age;
            $newHackMember->occupation = $hackOccupation->occupation;
            $newHackMember->tshirt = $hackShirtSize->tshirt_size;
            $newHackMember->team = $hackTeam->team_id;
            $newHackMember->is_captain = null;
            $newHackMember->save();

            $newMemberCount = ($team->members_count + 1);
            $team->members_count = $newMemberCount;


            if ($newMemberCount >= $event->min_team) {
                $hackTeam->is_confirmed = 1;
                $team->is_active = 1;
            }
            $hackTeam->save();
            $team->save();

            $message = __('Успешно потвърдихте поканата за влизане в отбор!');
            return redirect()->route('users.events')->with('success', $message);
        } else {
            $message = __('Отбора вече е пълен');
            return redirect()->route('users.events')->with('error', $message);
        }
    }

    public function inviteToTeam(Request $request, Team $team, Event $event)
    {
        $data = $request->validate([
            'email' => 'required|email',
        ]);

        $invites = TeamMember::where([
            ['event_team_id', $team->id],
        ])->whereBetween('created_at', [Carbon::now()->subDays(1)->format('Y-m-d H:m:s'), Carbon::now()->addDay(1)->format('Y-m-d H:m:s')])->count();

        if ($invites < 10) {
            $memberPlus = ($team->members_count + 1);

            if ($memberPlus <= $event->max_team) {
                $capitan = User::find(Auth::user()->id);

                $role = UsersTeamRole::where('role', 'участник')->select('id')->first();

                $isExisting = TeamMember::where([
                    ['email', $request->email],
                    ['event_team_id', $team->id]
                ])->first();
                if (is_null($isExisting)) {
                    $newMember = new TeamMember;
                    $newMember->email = $request->email;
                    $newMember->cl_users_team_role_id = $role->id;
                    $newMember->event_team_id = $team->id;
                    $newMember->confirmed = 0;
                    $newMember->save();

                    Mail::to($request->email)->send(new InviteMember($capitan, $team, $event));
                    $message = __('Успешно изпратихте покана за влизане в отбор!');
                    return redirect()->route('users.events')->with('success', $message);
                }
                if ($isExisting->confirmed < 0) {
                    $isExisting->confirmed = 0;
                    $isExisting->save();

                    Mail::to($request->email)->send(new InviteMember($capitan, $team, $event));
                    $message = __('Успешно изпратихте покана за влизане в отбор!');
                    return redirect()->route('users.events')->with('success', $message);
                } else {
                    $message = __('Вече сте изпратили покана на този Е-mail!');
                    return redirect()->route('users.events')->with('error', $message);
                }
            }
            $message = __('Капацитета на отбора ви е пълен!');
            return redirect()->route('users.events')->with('error', $message);
        }
        $message = __('Надвишихте дневния лимит за изпращане на покани!');
        return redirect()->route('users.events')->with('error', $message);
    }

    public function cwRegister(Event $event)
    {
        if($event->to > Carbon::now()){
            $occupations = Occupation::all();
            if(!Auth::user()){
                $user = null;
                return view('events.cw.registration', [
                    'user' => $user,
                    'event' => $event,
                    'occupations' => Occupation::all(),
                ]);
            }
            $user = User::find(Auth::user()->id);
            if (!Auth::user()->isOnCWEvent($event->id)) {
                return view('events.cw.registration', [
                    'user' => $user,
                    'event' => $event,
                    'occupations' => Occupation::all(),
                ]);
            }else{
                $message = __('Вече сте записани за събитието');
            }

            if ($event->to < Carbon::now() && Auth::user()->isOnCWEvent($event->id)) {
                $getLink = ExtraForm::where([
                    ['event_id',$event->id],
                    ['user_id',Auth::user()->id]
                ])->first();

                return view('events.cw.registration', [
                    'user' => $user,
                    'event' => $event,
                    'occupations' => Occupation::all(),
                    'for_link' => true,
                    'the_link' => isset($getLink->fields['link'])?$getLink->fields['link']:null,
                ]);
            }
        }else{
            $message = __('Събитието е отминало!');
        }

        return redirect()->route('users.events')->with('error', $message);
    }

    public function cwStoreForm(Request $request, $event)
    {
        if (Auth::user()) {
            if (isset($request->link)) {
                $data = $request->validate([
                    'link' => 'required|string|max:255',
                ]);
                $data = $request->except([
                    '_token',
                    '_method',
                ]);
                $addLink = ExtraForm::where([
                    ['event_id', $event],
                    ['user_id', Auth::user()->id]
                ])->first();
                $addLink->fields += $data;
                $addLink->save();

                $message = __('Успешно добавихте линк!');
                return redirect()->route('users.events')->with('success', $message);
            }
            $request['valid_categories'] = \Config::get('cwCategories');
            $data = $request->validate([
                'occupation' => 'required|numeric',
                'days' => 'required|numeric|',
                'categories.*' => 'sometimes|in_array:valid_categories.*',
                'visited' => 'required',
            ]);

            $user = User::find(Auth::user()->id);
            if ($request->userage) {
                $dob = null;
                $year = Carbon::now()->subYears($request->userage)->format('Y');
                $year .= '-01-01';
                $dob = Carbon::parse($year)->format('Y-m-d');
                $user->dob = $dob;
            }
            $user->cl_occupation_id = $data['occupation'];
            $user->save();
            $data = $request->except([
                '_token',
                '_method',
                'valid_categories',
                'occupation',
                'userage',
                'useremail'
            ]);
        } else {
            //not logged in/registered
            $request['valid_categories'] = \Config::get('cwCategories');
            $data = $request->validate([
                'username' => 'required',
                'lastname' => 'required',
                'useremail' => 'required',
                'userage' => 'required',
                'occupation' => 'required|numeric',
                'days' => 'required|numeric|',
                'categories.*' => 'sometimes|in_array:valid_categories.*',
                'visited' => 'required',
                'location' => ['required'],
                'sex' => ['required'],
            ]);

            $isExisting = User::where('email', $data['useremail'])->first();
            if ($isExisting) {
                return back()->withErrors(['грешка' => 'Моля, влезте в акаунта си и след това се запишете за CodeWeek']);
            }
            $role = Role::where('role', 'user')->select('id')->first();
            $dob = null;
            $year = Carbon::now()->subYears($request->userage)->format('Y');
            $year .= '-01-01';
            $dob = Carbon::parse($year)->format('Y-m-d');
            $newUser = User::create([
                'name' => $data['username'],
                'last_name' => $data['lastname'],
                'email' => $data['useremail'],
                'cl_role_id' => $role->id,
                'dob' => $dob,
                'cl_occupation_id' => $data['occupation'],
                'location' => $data['location'],
                'sex' => $data['sex'],
                'password' => Hash::make(str_random(12)),
            ]);
            $data = $request->except([
                '_token',
                '_method',
                'valid_categories',
                'occupation',
                'userage',
                'username',
                'lastname',
                'useremail',
                'location',
                'sex',
            ]);
        }
        if ($request->days == '0' || $request->days == 0) {
            $data['categories'] = '--';
        }
        $isRegistered = ExtraForm::where([
            ['user_id',isset($newUser) ? $newUser->id : $user->id],
            ['event_id',$event]
        ])->first();
        if($isRegistered || !is_null($isRegistered)){
            return back()->withErrors(['грешка' => 'вече сте регистриран!']);
        }
        $newCWRegistration = new ExtraForm;
        $newCWRegistration->event_id = $event;
        $newCWRegistration->user_id = isset($newUser) ? $newUser->id : $user->id;
        $newCWRegistration->fields = $data;
        $newCWRegistration->save();
        $link = 'https://www.facebook.com/events/354453948600024/';
        $webSite = 'https://codeweek.vratsasoftware.com/';
        $email = isset($newUser) ? $newUser->email : $user->email;
        Mail::to($email)->send(new cwRegistered($link, $webSite));

        if (!Auth::user()) {
            $token = Password::getRepository()->create($newUser);
            $newUser->sendPasswordResetNotification($token);

            return redirect('password/reset/' . $token);
        }

        $message = __('Успешно се регистрирахте за CodeWeek!');
        return redirect()->route('users.events')->with('success', $message);
    }

    public function cwIsPresent(Request $request, $userId, $eventId)
    {
        $data = $request->validate([
            'present' => 'required|numeric|min:0|max:3',
        ]);
        $presentUpd = ExtraForm::where([
            ['user_id',$userId],
            ['event_id',$eventId]
        ])->first();
        if($presentUpd){
            $presentUpd->is_present = $request->present;
            $presentUpd->save();
        }
        $message = __('Успешно променихте посещаемостта на потребителя');
        return redirect()->back()->with('success', $message);
    }
}
