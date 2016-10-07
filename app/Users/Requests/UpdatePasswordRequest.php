<?php
namespace App\Users\Requests;

use Dingo\Api\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'password' => 'required|min:6|confirmed',
            'old_password' => 'required',
        ];
    }
}
