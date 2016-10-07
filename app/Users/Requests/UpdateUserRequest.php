<?php
namespace App\Users\Requests;

use App\Users\User;
use Dingo\Api\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $user = $this->route('user');

        return [
            'email' => 'email|required|unique:' . User::TABLE . ',email,' . $user->id(),
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:' . User::TABLE . ',username,' . $user->id(),
        ];
    }
}
