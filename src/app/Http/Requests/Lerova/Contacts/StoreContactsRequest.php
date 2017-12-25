<?php

namespace App\Http\Requests\Lerova\Contacts;

use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;


class StoreContactsRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|numeric',
            'body' => 'nullable'
          ,
        ];
    }
}
