<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AcctCreditsAccountRequest extends FormRequest
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
                'business_officer_id' => ['required'], //unique 'unique:core_branch,branch_code,'. request()->branch
                'province_id' => ['required'],
                'credits_id' => ['required'],
                'city_id' => ['required'],
                'kecamatan_id' => ['required'],
                'source_fund_id' => ['required'],
                'branch_id' => ['required'],
                'credits_account_name' => ['required'],
                'credits_account_address' => ['required'],
                'credits_account_no' => ['required'],
                'credits_account_date' => ['required'],
                'credits_account_due_date' => ['required'],
                'credits_account_period' => ['required'],
                // 'credits_account_method' => ['required'],
                'credits_account_total_amount' => ['required'],
                'credits_account_payment_amount' => ['required'],
                'credits_account_last_balance' => ['required'],
                'credits_account_payment_to' => ['required'],
                'credits_account_interest_amount' => ['required'],
                'credits_account_interest' => ['required'],
                'credits_account_accumulated_fines' => ['required'],
                
                // 'credits_account_payment_date' => ['required'],
                // 'credits_account_payment_date_last' => ['required'],
                // 'credits_account_accumulated_fines' => ['required'],
                // 'credits_account_collection_status' => ['required'],
                // 'credits_account_collection_status_id' => ['required'],
                // 'credits_account_collection_status_at' => ['required'],
                // 'receivable_account_id' => ['required'],
                // 'income_account_id' => ['required'],
                // 'credits_fine' => ['required', 'email'],
        ];
    }
}
