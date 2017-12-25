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
            'teaser' => 'max:' .config('lerova.core.blog.teaser_max'),
            'body' => '',
            'tags' => 'array',
            'image' => 'required|url',
        ];
    }
}
