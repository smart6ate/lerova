<?php

namespace App\Http\Requests\Lerova\Members;

use Illuminate\Foundation\Http\FormRequest;


class StoreMembersRequest extends FormRequest
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
            'name' => 'required|max:' . config('lerova.core.blog.title_max'),
            'teaser' => 'nullable|max:' .config('lerova.core.blog.teaser_max'),
            'education' => 'nullable|max:250',
            'email' => 'nullable|max:250',
            'phone' => 'nullable|max:250',
            'tags' => 'array',
            'linkedin' => 'nullable|max:250',
            'xing' => 'nullable|max:250',
            'google_plus' => 'nullable|max:250',
            'web' => 'nullable|max:250',
            'image' => 'required|url',
        ];
    }
}
