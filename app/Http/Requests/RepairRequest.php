<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RepairRequest extends Request
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
            'rep_time'=>'required',
            'rep_date'=>'required',
            'rep_dur'=>'required',
            'rep_status'=>'required',
            'rep_details'=>'required'

        ];
    }
}
