<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoreBranchRequest extends FormRequest
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
                'branch_code' => ['required'], //unique 'unique:core_branch,branch_code,'. request()->branch
                'branch_name' => ['required'],
                'branch_address' => ['required'],
                'city_id' => ['required'],
                'branch_contact_person' => ['required'],
                'branch_email' => ['required', 'email'],
                'branch_phone1' => ['required'],
                'branch_phone2' => ['required'],
                'branch_manager' => ['required'],

        ];
    }
}
