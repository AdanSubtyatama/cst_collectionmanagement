<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoreBusinessOfficerRequest extends FormRequest
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
                'business_officer_code' => ['required'], //unique 'unique:core_branch,branch_code,'. request()->branch
                'business_officer_name' => ['required'],
        ];
    }
}
