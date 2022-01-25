<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AcctSourceFundRequest extends FormRequest
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
                'source_fund_code' => ['required'], //unique 'unique:core_branch,branch_code,'. request()->branch
                'source_fund_name' => ['required'], //unique 'unique:core_branch,branch_code,'. request()->branch
                // 'credits_name' => ['required'],
                // 'credits_number' => ['required'],
                // 'receivable_account_id' => ['required'],
                // 'income_account_id' => ['required'],
                // 'credits_fine' => ['required', 'email'],
        ];
    }
}
