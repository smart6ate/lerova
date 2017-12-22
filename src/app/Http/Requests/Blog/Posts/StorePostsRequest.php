<?php

namespace Smart6ate\Lerova\App\Http\Requests\Blog\Posts;

use Illuminate\Foundation\Http\FormRequest;


class StorePostsRequest extends FormRequest
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
            'page_id' => 'required|exists:meta,id',
            'title' => 'required|max:' . config('lerova.core.blog.title_max'),
            'teaser' => 'required|max:' .config('lerova.core.blog.teaser_max'),
            'body' => 'required',
            'tags' => 'required|array',
            'image' => 'required|url',
        ];
    }
}
