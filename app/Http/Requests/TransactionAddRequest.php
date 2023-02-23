<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionAddRequest extends FormRequest
{
    
    public function prepareForValidation()
    {

        // Amount format for insertion
        $amount = str_replace("$ ","",$this->amount);
        $amount = str_replace(",","",$amount);
        
        // If it's an expense, we save it with a negative sign
        if ($this['transaction-type-radio'] == 'expense') {
            $amount = $amount * -1;
        }

        // Replace the original request's amount, for the formatted one
        $this->merge([
            'amount' => $amount
        ]);
    }
    
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
        return ['id_account'=>['required'],
                'id_transaction_type'=>['required'],
                'amount'=>['required','not_in:0'],
                'comments'=>['required'],
       ];

    }
}
