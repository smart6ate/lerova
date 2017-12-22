<?php

namespace Smart6ate\Lerova\App\Http\Requests\Settings\Pages;


use Illuminate\Foundation\Http\FormRequest;


class UpdatePageRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'required|string',
            'keywords' => 'required|array',
            'image' => 'required|url',
        ];
    }
}
