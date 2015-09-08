<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AddMachineRequest extends Request
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
          'machine_name'=>'required',
          'serial_number'=>'required',
          'machine_supplier'=>'required',
          'production_line'=>'required',
          'manufacturer'=>'required',
          'buying_date'=>'required'
        ];
    }
}
