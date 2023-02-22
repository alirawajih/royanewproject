<?php

namespace App\Http\Requests;

use App\Models\Accounts;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AccountsRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {

        $validation = [
            'firstName' => ['required', 'string'],
            'lastName' => ['required', 'string'],
            'phoneNumber' => ['required', 'digits:10'],
            'option' => ['required'],
            'views' =>['']
        ];
        if ($this->getMethod('post')=="POST") {

            $validation['emailAddress'] = ['required', 'string','unique:accounts'];
            $validation['password'] = ['required','confirmed'];
            $validation['password_confirmation']=['required'];


        }
        if ($this->getMethod('post')=="PUT") {
            $validation['emailAddress'] = ['required', 'string',
                Rule::unique('accounts')->ignore($this->id)];


        }
        return $validation;
    }
}
