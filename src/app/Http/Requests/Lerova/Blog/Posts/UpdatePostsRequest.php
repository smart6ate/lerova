<?php

namespace App\Http\Requests\Lerova\Blog\Posts;

use Illuminate\Foundation\Http\FormRequest;


class UpdatePostsRequest extends FormRequest
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
            'page_id' => 'required|exists:pages,id',
            'title' => 'required|max:' . config('lerova.core.blog.title_max'),
            'teaser' => 'required|max:' . config('lerova.core.blog.teaser_max'),
            'body' => 'required',
            'tags' => 'required|array',
            'image' => 'required|url',
        ];
    }
}
