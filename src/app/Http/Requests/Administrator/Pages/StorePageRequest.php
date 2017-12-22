<?php

namespace Smart6ate\Lerova\App\Http\Requests\Administrator\Pages;


use Illuminate\Foundation\Http\FormRequest;


class StorePageRequest extends FormRequest
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
            'title' => 'required|max:' . config('lerova.core.blog.title_max'),
        ];
    }
}
