<?php

namespace App\Http\Controllers\Users;

use App\Http\Requests\ProfileRequest;
use App\Models\Courses\PersonalCertificate;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Users\Education;
use App\Models\Users\WorkExperience;
use App\Models\Users\Hobbie;
use App\Models\Users\Interest;

class UserController extends Controller
{
    public function publicProfile($id) {
        return view('profile.user-profile.index');
    }

    public function editAccount() {
        return view('profile.user-profile.edit', UserService::profileData());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function editProfile()
    {
        return view('profile.edit', UserService::profileData());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, User $user)
    {
        $response = UserService::userUpdate($request, $user);

        return redirect('profile')->with($response['messageType'], $response['message']);
    }

    public function createEducation(Request $request)
    {
        $request->validate([
            'y_from' => 'required|numeric|min:1900|max:2099',
            'y_to' => 'sometimes|nullable|numeric|min:'.((int)$request->y_from-1).'|max:2099',
            'institution_name' => 'required|string',
            'specialty' => 'string',
        ]);

        $existing = Education::isExisting(Auth::user()->id, $request);
        if (!$existing) {
            $insEdu = new Education;
            $insEdu->user_id = Auth::user()->id;
            $insEdu->y_from = $request->y_from;
            $insEdu->y_to = $request->y_to;
            $insEdu->institution = $request->institution_name;
            $insEdu->specialty = $request->specialty;
            $insEdu->save();

            $message = __('Успешно добавено Образование!');
            return redirect()->back()->with('success', $message);
        }

        $message = __('Вече съществува такова Образование за този потребител!');
        return redirect()->back()->with('error', $message);
    }

    public function updateEducation(Request $request)
    {
        $request->validate([
            'y_from' => 'required|numeric|min:1900|max:2099',
            'y_to' => 'sometimes|nullable|numeric|min:'.((int)$request->y_from-1).'|max:2099',
            'institution_name' => 'required|string',
            'specialty' => 'string',
        ]);

        $updEdu = Education::find($request->edu_id);
        $updEdu->y_from = $request->y_from;
        $updEdu->y_to = $request->y_to;
        $updEdu->institution = $request->institution_name;
        $updEdu->specialty = $request->specialty;
        $updEdu->save();

        $message = __('Успешно направени промени в секция Образование!');
        return redirect('profile/edit')->with('success', $message);
    }

    public function deleteEducation(Education $education)
    {
        $education->delete();
        $message = __('Успешно изтрито Образование!');
        return redirect('profile/edit')->with('success', $message);
    }

    public function createWorkExperience(Request $request)
    {
        $data = $request->validate([
            'y_from' => 'required|integer',
            'y_to' => 'sometimes|nullable',
            'work_company' => 'required|string',
            'work_position' => "required|string",
        ]);

        $createWorkExp = new WorkExperience;
        $createWorkExp->user_id = Auth::user()->id;
        $createWorkExp->y_from = $data['y_from'];
        $createWorkExp->y_to = $data['y_to'];
        $createWorkExp->company = $data['work_company'];
        $createWorkExp->position = $data['work_position'];
        $createWorkExp->save();

        $message = __('Успешно добавен Работен Опит!');
        return redirect()->back()->with('success', $message);
    }

    public function updateWorkExperience(Request $request)
    {
        $data = $request->validate([
            'y_from' => 'required',
            'y_to' => 'nullable',
            'work_company' => 'required|string',
            'work_position' => "required|string",
        ]);

        $updWorkExp = WorkExperience::find($request->work_id);
        $updWorkExp->y_from = $data['y_from'];
        $updWorkExp->y_to = $data['y_to'];
        $updWorkExp->company = $data['work_company'];
        $updWorkExp->position = $data['work_position'];
        $updWorkExp->save();

        $message = __('Успешно направени промени в секция Работен Опит!');
        return redirect('profile/edit')->with('success', $message);
    }

    public function deleteWorkExperience(WorkExperience $experience)
    {
        $experience->delete();
        $message = __('Успешно изтрит Работен Опит!');
        return redirect('profile/edit')->with('success', $message);
    }

    public function createHobbies(Request $request)
    {
        $request->validate([
            'int_type' => 'required|numeric|min:1',
            'interests' => 'sometimes|numeric|min:1',
            'int_other' => 'sometimes|string|max:255',
        ]);

        if (!empty($request->interests)) {
            $interest = Interest::find($request->interests);
            $interestCheck = Interest::firstOrCreate([
                'cl_users_interest_type_id' => $request->int_type,
                'name' => $interest->name
            ]);

            Hobbie::firstOrCreate([
                'cl_interest_id' => $interestCheck->id,
                'user_id' => Auth::user()->id
            ]);
        }

        if (!empty($request->int_other)) {
            $interestCheck = Interest::firstOrCreate(
                ['cl_users_interest_type_id' => $request->int_type,'name' => $request->int_other]
            );

            Hobbie::firstOrCreate(
                ['cl_interest_id' => $interestCheck->id,'user_id' => Auth::user()->id]
            );
        }

        $message = __('Успешно добавени интереси/хобита!');
        return redirect()->route('profile')->with('success', $message);
    }

    public function deleteHobbie(Hobbie $hobbie)
    {
        $hobbie->delete();
        $message = __('Успешно изтрит интерес/хоби!');
        return redirect()->route('profile')->with('success', $message);
    }

    public function getInterests($type)
    {
        return response()->json(Interest::where('cl_users_interest_type_id', $type)->get());
    }

    public function showCertificate($user, $course)
    {
        $personalCertificate = PersonalCertificate::where([
            ['user_id',$user],
            ['course_id',$course]
        ])->first();

        if(isset($personalCertificate) && $personalCertificate){
            $personalCertificate->modules = explode(",", $personalCertificate->modules);

            $mainTemplate = View('certifications.templates.main', [
                'number' => $personalCertificate->number,
                'color' => $personalCertificate->color,
                'title' => $personalCertificate->title,
                'subTitle' => $personalCertificate->sub_title,
                'modules' => $personalCertificate->modules,
                'username' => $personalCertificate->username,
                'lecturer' => $personalCertificate->lecturer,
                'date' => $personalCertificate->date->format('d/m/Y'),
                'images' => 0,
                'imageLeft' => '',
                'imageRight' => '',
                'centerLogo' => $personalCertificate->center_logo,
            ]);
            return $mainTemplate;
        }
        return back()->with('error','Все още нямате сертификат!');
    }
}
