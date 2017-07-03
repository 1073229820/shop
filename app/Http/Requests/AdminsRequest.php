<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminsRequest extends Request
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
        $id = $this->route('admins');
        return [
            'name' => 'required|min:2|max:25|alpha_dash|unique:admins,name,'.$id,
            'pass' => 'required|min:6|max:255',
            'sex' => 'required',
            'userpic' => 'required',
            'email' => 'required|email',
            'status' => 'required',
        ];
    }
}
