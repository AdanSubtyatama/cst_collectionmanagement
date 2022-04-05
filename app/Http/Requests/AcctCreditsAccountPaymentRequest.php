<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AcctCreditsAccountPaymentRequest extends FormRequest
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
                'credits_account_id'        => ['required'], 
                'member_id'                 => ['required'], 
                'branch_id'                 => ['required'], 
                'credits_payment_amount'    => ['required'], 
                'credits_payment_token'     => ['required'], 
                
        ];
    }
}
