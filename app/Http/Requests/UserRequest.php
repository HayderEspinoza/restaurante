<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        switch ($this->getMethod()) 
        {
            case 'PUT':
                $user = $this->route('user');
                return [
                    'name' => 'required',
                    'lastname' => 'required',
                    'username' => 'required|unique:users,username,'.$user.',id',
                    'role_id' => 'required',
                    'email' => 'required|unique:users,email,'.$user.',id',
                ];
            case 'POST':
                return [
                    'name' => 'required',
                    'lastname' => 'required',
                    'username' => 'required|unique:users,username',
                    'role_id' => 'required',
                    'email' => 'required|unique:users,email',
                ];
        }
    }
}
