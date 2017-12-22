<?php

namespace Smart6ate\Lerova\App\Http\Requests\Blog\Events;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;


class UpdateLinksRequest extends FormRequest
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
            'url' => 'required|url',
            'tags' => 'required|array',
            'image' => 'required|url',
        ];
    }
}
