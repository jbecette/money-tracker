<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountAddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        return ['id_user'=>['required'],
                'name'=>['required'],
                'description'=>['required'],
               ];
    }

    public function messages()
    {
        return [
            'name.required' => 'You need to assign a name to the account.',
        ];
    }
}
