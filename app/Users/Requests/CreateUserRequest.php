<?php
namespace App\Users\Requests;

use App\Users\User;
use Dingo\Api\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'email|required|unique:' . User::TABLE . ',email',
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:' . User::TABLE . ',username',
        ];
    }
}
