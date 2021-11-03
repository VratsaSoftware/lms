<?php

namespace App;

use App\Models\Admin\Poll;
use App\Models\Admin\PollVote;
use App\Models\CourseModules\Homework;
use App\Models\CourseModules\HomeworkComment;
use App\Models\CourseModules\ModulesStudent;
use App\Models\Courses\Entry;
use App\Models\Events\ExtraForm;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Users\Role;
use Illuminate\Support\Facades\Auth;
use App\Models\Courses\CourseLecturer;
use App\Models\Courses\Certification;
use App\Models\Courses\Course;
use App\Models\CourseModules\Module;
use App\Models\CourseModules\Lection;
use App\Models\CourseModules\LectionComment;
use App\Models\Users\Education;
use App\Models\Users\SocialLink;
use App\Models\Users\VisibleInformation;
use App\Models\Users\WorkCompany;
use App\Models\Users\WorkExperience;
use App\Models\Users\WorkPosition;
use App\Models\Users\Hobbie;
use App\Models\Users\Occupation;
use App\Notifications\PasswordReset;
use App\Models\Events\TeamMember;
use App\Models\Events\Event;
use App\Models\Events\Team;
use App\Models\Users\UsersTeamRole;
use App\Models\Tests\Test;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    protected $dates = ['dob'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function Role()
    {
        return $this->hasMany(Role::class, 'id', 'cl_role_id');
    }

    public function Lecturer()
    {
        return $this->hasMany(CourseLecturer::class);
    }

    public function Certifications()
    {
        return $this->hasMany(Certification::class);
    }

    public function Occupation()
    {
        return $this->hasOne(Occupation::class, 'id', 'cl_occupation_id');
    }

    public function Test()
    {
        return $this->belongsToMany(Test::class, 'test_users_assign');
    }

    public function Applications()
    {
        return $this->hasMany(Entry::class,'user_id','id');
    }

    public function isOnCourse()
    {
        $userId = Auth::user()->id;
        $isOnCourse = Course::with('Modules', 'Modules.ModulesStudent', 'Modules.ModulesStudent.User')->whereHas('Modules.ModulesStudent', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->get();
        if (!$isOnCourse->isEmpty()) {
            return true;
        }
        return false;
    }

    public function isOnThisCourse($course)
    {
        $userId = Auth::user()->id;
        $isOnCourse = Course::with('Modules', 'Modules.ModulesStudent')->whereHas('Modules.ModulesStudent', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->find($course);

        if ($isOnCourse) {
            return true;
        }
        return false;
    }

    public function adminGetCourses()
    {
        return Course::all();
    }

    public function studentGetCourse()
    {
        $userId = Auth::user()->id;
        return Course::where('ends', '>', Carbon::now()->format('Y-m-d H:m:s'))
            ->orderBy('ends', 'DESC')
            ->with(['Modules' => function ($q) use ($userId) {
                $q->whereHas('ModulesStudent', function ($query) use ($userId) {
                    $query->where([
                        'user_id' => $userId,
//                        'visibility' => 'public',
                    ])->orderBy('id');
                });
            },
                'Modules.ModulesStudent',
                'Modules.ModulesStudent.User'
            ])
            ->whereHas('Modules.ModulesStudent', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })->where('visibility', '!=', 'draft')->get();
    }

    public function studentGetPastCourse()
    {
        $userId = Auth::user()->id;
        return Course::where('ends', '<', Carbon::now()->format('Y-m-d H:m:s'))
            ->orderBy('ends', 'DESC')
            ->with(['Modules' => function ($q) use ($userId) {
                $q->whereHas('ModulesStudent', function ($query) use ($userId) {
                    $query->where('user_id', $userId);
                });
            },
                'Modules.ModulesStudent',
                'Modules.ModulesStudent.User'
            ])
            ->whereHas('Modules.ModulesStudent', function ($query) use ($userId) {
                $query->where([
                    'user_id' => $userId,
                    'visibility' => 'public',
                ])->orderBy('id');
            })->where('visibility', '!=', 'draft')->get();
    }

    public function activeGetCourse()
    {
        return Course::where('applications_to', '>', Carbon::now()->format('Y-m-d H:m:s'))
            ->where('applications_from', '<', Carbon::now()->format('Y-m-d H:m:s'))
            ->orderBy('applications_to', 'DESC')
            ->get();
    }

    public function lecturerGetCourses()
    {
        $userId = Auth::user()->id;
        return Course::where('ends', '>', Carbon::now()->format('Y-m-d H:m:s'))
            ->orderBy('ends', 'DESC')
            ->with('Lecturers')
            ->whereHas('Lecturers', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })->get();
    }

    public function lecturerGetPastCourses()
    {
        $userId = Auth::user()->id;
        return Course::where('ends', '<', Carbon::now()->format('Y-m-d H:m:s'))
            ->orderBy('ends', 'DESC')
            ->with('Lecturers')
            ->whereHas('Lecturers', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })->get();
    }

    public function getSocialLinks()
    {
        return SocialLink::with('SocialName')->where('user_id', Auth::user()->id)->get();
    }

    public function hasCertification()
    {
        $certificates = Certification::where('user_id', Auth::user()->id)->get();
        if (!$certificates->isEmpty()) {
            return true;
        }
        return false;
    }

    public function getCertificates()
    {
        return Certification::with('Users', 'Courses.Lecturers.User', 'Modules')->where('user_id', Auth::user()->id)->get();
    }

    public function hasEducation(User $user = null)
    {
        $findEdu = Education::where('user_id', Auth::user()->id)->get();
        if (!$findEdu->isEmpty()) {
            return true;
        }
        return false;
    }

    public function getEducation()
    {
        return Education::with('Users', 'EduType', 'EduInstitution', 'EduSpeciality')
            ->where('user_id', Auth::user()->id)
            ->get();
    }

    public function lastEducation()
    {
        return Education::with('EduInstitution', 'EduSpeciality')
            ->where('user_id', $this->id)
            ->orderByDesc('y_from')
            ->first();
    }

    public function isVisible($type)
    {
        if (in_array($type, \Config::get('userInformationTypes'))) {
            $visibleCheck = VisibleInformation::where([
                ['user_id', Auth::user()->id],
                ['information_type', $type],
                ['visible', true]
            ])->first();
            if (!is_null($visibleCheck)) {
                return true;
            }
            return false;
        }
        return false;
    }

    public function hasWorkExp()
    {
        $hasWorkExp = WorkExperience::where([
            ['user_id', Auth::user()->id],
        ])->first();
        if (!is_null($hasWorkExp)) {
            return true;
        }
        return false;
    }

    public function getWorkExp()
    {
        return WorkExperience::where('user_id', $this->id)
            ->with('Company', 'Position')
            ->get();
    }

    public function lastWorkExp()
    {
        return WorkExperience::where('user_id', $this->id)
            ->orderByDesc('y_from')
            ->first();
    }

    public function hasHobbies()
    {
        $hasHobbies = Hobbie::where('user_id', Auth::user()->id)->first();
        if (!is_null($hasHobbies)) {
            return true;
        }
        return false;
    }

    public function getHobbies()
    {
        return Hobbie::where('user_id', Auth::user()->id)->with('Interests.Type')->get();
    }

    public function isCommented($lection)
    {
        $commented = LectionComment::where([
            ['course_lection_id', $lection],
            ['user_id', Auth::user()->id],
        ])->first();
        if (!is_null($commented)) {
            return true;
        }
        return false;
    }

    public function getNameAttribute($value)
    {
        return mb_convert_case($value, MB_CASE_TITLE, 'UTF-8');
    }

    public function getLastNameAttribute($value)
    {
        return mb_convert_case($value, MB_CASE_TITLE, 'UTF-8');
    }

    public function getLocationAttribute($value)
    {
        return mb_convert_case($value, MB_CASE_TITLE, 'UTF-8');
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordReset($token));
    }

    public function isOnTeamEvent($eventId)
    {
        $isMember = TeamMember::with('Teams')->where('user_id', Auth::user()->id)->orWhere('email', Auth::user()->email)->get();
        if (!is_null($isMember)) {
            foreach ($isMember as $member) {
                foreach ($member->Teams as $team) {
                    if ($team->events_id == $eventId) {
                        return true;
                    }
                }
            }
            return false;
        }
    }

    public function isOnCWEvent($eventId)
    {
        $isOnCw = ExtraForm::where([
            ['event_id', $eventId],
            ['user_id', Auth::user()->id]
        ])->first();
        if ($isOnCw) {
            return true;
        }
        return false;
    }

    public function isEventInvited($status)
    {
        if ($status != 'confirmed') {
            $isInvited = TeamMember::with('Teams')->where([
                ['confirmed', 0],
                ['user_id', Auth::user()->id]
            ])->orWhere([
                ['confirmed', 0],
                ['email', Auth::user()->email]
            ])->get();
        } else {
            $isInvited = TeamMember::with('Teams')->where([
                ['confirmed', 1],
                ['user_id', Auth::user()->id]
            ])->orWhere([
                ['confirmed', 1],
                ['email', Auth::user()->email]
            ])->get();
        }

        if ($isInvited->isEmpty()) {
            return false;
        }
        return true;
    }

    public function getInvitedEvents()
    {
        $userId = Auth::user()->id;
        $userEmail = Auth::user()->email;
        return Event::with('Teams', 'Teams.Members')->whereHas('Teams.Members', function ($query) use ($userId, $userEmail) {
            $query->where('user_id', $userId)->orWhere('email', $userEmail);
        })->where('visibility', '!=', 'draft')->select('name')->get();
    }

    public function isConfirmedMember($event)
    {
        $isConfirmed = TeamMember::with('Teams')->whereHas('Teams', function ($query) use ($event) {
            $query->where([
                ['events_id', $event],
            ]);
        })->where([
            ['confirmed', 1],
            ['user_id', Auth::user()->id]
        ])->orWhere([
            ['confirmed', 1],
            ['email', Auth::user()->email]
        ])->get();

        foreach ($isConfirmed as $key => $check) {
            foreach ($check->Teams as $team) {
                if ($check->Teams()->exists() && $team->events_id == $event) {
                    return true;
                }
            }
        }
        return false;
    }

    public function getMemberInvitedTeam($event)
    {
        $userId = Auth::user()->id;
        $userEmail = Auth::user()->email;

        $invites = TeamMember::with('Teams')->where([
            ['user_id', $userId],
            ['confirmed', 0],
        ])->orWhere([
            ['email', $userEmail],
            ['confirmed', 0],
        ])->whereHas('Teams', function ($query) use ($event) {
            $query->where([
                ['events_id', $event],
            ]);
        })->get();

        foreach ($invites as $invite) {
            foreach ($invite->Teams as $team) {
                if ($team->events_id == $event) {
                    return $invites;
                }
            }
        }
        return [];
    }

    public function getTeam($capitan, $event = null)
    {
        $userId = Auth::user()->id;
        $role = UsersTeamRole::where('role', 'капитан')->select('id')->first();
        if ($capitan) {
            return Team::where('events_id', $event)->with('Members', 'Members.User')->whereHas('Members', function ($query) use ($userId, $role) {
                $query->where([
                    ['user_id', $userId],
                    ['cl_users_team_role_id', $role->id]
                ]);
            })->first();
        }
        return Team::with('Members', 'Members.User')->whereHas('Members', function ($query) use ($userId, $role) {
            $query->where([
                ['user_id', $userId],
            ]);
        })->first();
    }

    public function isCapitan($team)
    {
        $userId = Auth::user()->id;
        $member = TeamMember::where([
            ['event_team_id', $team],
            ['user_id', $userId],
            ['cl_users_team_role_id', 1],//to do role from table for capitan
        ])->first();
        if (!is_null($member)) {
            return true;
        }
        return false;
    }

    public function getPolls()
    {
        $valid = [0 => null];
        $polls = Poll::with('Options', 'Options.Votes')->where([
            ['start', '<', Carbon::now()],
            ['ends', '>', Carbon::now()]
        ])->where('visibility', '!=', 'draft')->get();

        foreach ($polls as $key => $testPoll) {
            foreach ($testPoll->Options as $option) {
                $optionIds[] = $option->id;
            }

            $isVoted = PollVote::whereIn('poll_option_id', $optionIds)->where('user_id', Auth::user()->id)->first();
            //if there is a poll started or close to start with datetime now under 1 minute we send the poll
            if ($testPoll && is_null($isVoted)) {
                if ($testPoll->start->diff(Carbon::now())->format('%m') < 1) {
                    $valid = [];
                    $valid[] = $testPoll;
                }
            }
            $optionIds = [];
        }
        return $valid[0];
    }

    public function upcomingEvent() {
        return Event::where('visibility', 'public')
        ->where('from', '>=', Carbon::now()->format('Y-m-d H:m:s'))
            ->where('to', '>', Carbon::now()->format('Y-m-d H:m:s'))
            ->where('visibility', 'public')
            ->orderBy('from', 'ASC')
            ->first();
    }

    public function isHomeWorkUploadedByLection($user_id = null, $lection_id)
    {
        is_null($user_id) ? $user_id = Auth::user()->id : $user_id;
        $is_uploaded = Homework::where([
            ['user_id', $user_id],
            ['lection_id', $lection_id]
        ])->first();

        return $is_uploaded ? true : false;
    }

    public function evalutedHomeWorksCount($user_id = null, $lection_id)
    {
        is_null($user_id) ? $user_id = Auth::user()->id : $user_id;
        $eval_count = HomeworkComment::with('homework')->where([
            ['user_id', $user_id],
            ['is_evaluated', '>', 0]
        ])->whereHas('homework', function ($q) use ($lection_id) {
            $q->where('lection_id', $lection_id);
        })->count();

        return $eval_count;
    }

    public function getHomeworkCommentsByLection($user_id = null, $lection_id)
    {
        is_null($user_id) ? $user_id = Auth::user()->id : $user_id;
        $comments = HomeworkComment::with('homework', 'Author')->whereHas('homework', function ($q) use ($user_id, $lection_id) {
            $q->where([
                ['user_id', $user_id],
                ['lection_id', $lection_id]
            ]);
        })->where('is_evaluated', '>', 0)->orderBy('is_lecturer_comment', 'DESC')->get();
        //ordered by admin/lecturer comments first
        return $comments;
    }

    public function isCompletedEval($user_id = null, $lection)
    {
        is_null($user_id) ? $user_id = Auth::user()->id : $user_id;

        $isCompletedEval = HomeworkComment::with('homework', 'Author')->where('is_evaluated', 0)->orWhereNull('is_evaluated')->where('user_id', $user_id)->whereHas('homework', function ($q) use ($lection) {
            $q->where([
                ['lection_id', $lection]
            ]);
        })->first();

        return $isCompletedEval ? false : true;
    }

    public function getRandomHomework($user_id = null, $lection)
    {
        is_null($user_id) ? $user_id = Auth::user()->id : $user_id;
        $evaluated = Homework::whereHas('comments', function ($q) use ($lection, $user_id) {
            $q->where([
                ['lection_id', $lection],
                ['user_id', $user_id],
                ['is_evaluated', '>', '0']
            ]);
        })->pluck('id')->toArray();

        if (count($evaluated) < 0) {
            $evaluated = Homework::where([
                ['user_id', $user_id],
                ['lection_id', $lection]
            ])->pluck('id')->toArray();
        }

        $homeworksEvalSum = Homework::where([
            ['lection_id', $lection],
            ['user_id', '!=', $user_id]
        ])->whereNotIn('id', $evaluated)->sum('evaluated_count');

        $homeworksEvalCount = Homework::where([
            ['lection_id', $lection],
            ['user_id', '!=', $user_id]
        ])->whereNotIn('id', $evaluated)->count();

        if ($homeworksEvalCount > 0) {
            $evalMax = floor($homeworksEvalSum / $homeworksEvalCount);
            if ($evalMax < 1) {
                $evalMax = 1;
            }
        } else {
            $evalMax = 1;
        }
        $randomHomeWork = Homework::whereNull('evaluated_count')->where([
            ['lection_id', $lection],
            ['user_id', '!=', $user_id],
        ])->whereNotIn('id', $evaluated)->get();

        if (count($randomHomeWork) < 1) {
            $randomHomeWork = Homework::where('evaluated_count', '<', $evalMax)->where([
                ['lection_id', $lection],
                ['user_id', '!=', $user_id],
            ])->whereNotIn('id', $evaluated)->get();
        }
        if (count($randomHomeWork) > 0) {
            $randomId = $randomHomeWork->random(1);
        } else {
            $randomHomeWork = Homework::where([
                ['lection_id', $lection],
                ['user_id', '!=', $user_id],
            ])->whereNotIn('id', $evaluated)->get();
            $randomId = count($randomHomeWork) ? $randomHomeWork->random(1) : [];
        }

        return isset($randomId[0]['id']) ? $randomId[0]['id'] : [];
    }

    public function getUnFinishedEval($user_id, $lection)
    {
        is_null($user_id) ? $user_id = Auth::user()->id : $user_id;
        $unFinishedEval = HomeworkComment::with('homework', 'Author')->whereHas('homework', function ($q) use ($lection) {
            $q->where([
                ['lection_id', $lection]
            ]);
        })->where('is_evaluated', 0)->orWhereNull('is_evaluated')->where('user_id', $user_id)->first();
        return $unFinishedEval->homework;
    }

    public function getUploadedHomeworksCount($module, $user)
    {
        is_null($user) ? $user = Auth::user()->id : $user;
        $homeWorkUploadCount = Homework::where('user_id', $user)->with('lection', 'lection.module')->whereHas('lection.module', function ($q) use ($module) {
            $q->where('id', $module);
        })->count();

        return $homeWorkUploadCount;
    }

    public function getHomeWorkEvalCountModule($module, $user)
    {
        is_null($user) ? $user = Auth::user()->id : $user;
        $homeWorkEvalCount = HomeworkComment::where([
            ['user_id', $user],
            ['is_evaluated', '>', '0']
        ])->with('homework', 'homework.lection', 'homework.lection.module')->whereHas('homework.lection.module', function ($q) use ($module) {
            $q->where('id', $module);
        })->count();

        return $homeWorkEvalCount;
    }

    public function isAdmin() {
        return $this->cl_role_id == config('consts.USER_ROLE_ADMIN');
    }

    public function isLecturer() {
        return $this->cl_role_id == config('consts.USER_ROLE_LECTURER');
    }

    public function isStudent() {
        return $this->cl_role_id == config('consts.USER_ROLE_STUDENT');
    }
}
