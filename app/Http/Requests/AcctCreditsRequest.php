<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AcctCreditsRequest extends FormRequest
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
                'credits_code' => ['required'], //unique 'unique:core_branch,branch_code,'. request()->branch
                'credits_name' => ['required'],
                'credits_number' => ['required'],
                // 'receivable_account_id' => ['required'],
                // 'income_account_id' => ['required'],
                // 'credits_fine' => ['required', 'email'],
        ];
    }
}
