<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostNewsRequest extends FormRequest
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
            'option' => ['required', 'string'],
            'title' => ['required', 'string'],
            'image' => ['required', 'file'],
            'employee_id'=>[],
            'description' => ['required']
        ];
        if (!request()->isMethod('post')) {
            $validation['image'] = ['file'];
        }

        return $validation;
    }
}
