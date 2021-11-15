<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'picture' => 'nullable|mimes:jpeg,jpg,png,gif,webp,ico',
            'name' => 'nullable|sometimes|string|min:3|max:25|',
            'location' => 'nullable|sometimes|min:3|max:10|string|',
            'dob' => 'nullable|sometimes|date_format:m/d/Y|before:' . Carbon::now()->format('d.m.Y') . '|after:01/01/1900',
            'email' => ['sometimes', 'email'],
            'facebook' => 'nullable|url|min:5|max:250',
            'linkedin' => 'nullable|url|min:5|max:250',
            'github' => 'nullable|url|min:5|max:250',
            'skype' => 'nullable|url|min:5|max:250',
            'dribbble' => 'nullable|url|min:5|max:250',
            'behance' => 'nullable|url|min:5|max:250',
            'newPassword' => 'nullable|min:6',
            'confirmPassword' => 'nullable|min:6',
        ];
    }
}
