<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ReportFailureRequest extends Request
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
            //
            'fail_name' => 'required',
            'machine_id' => 'required',
            'fail_time' => 'required | date',
            'fail_type' => 'required',
            'shift' => 'required',
            'fail_importance' => 'required'
           
            
        ];
    }
}
