<?php
namespace App\Riders\Requests;

use Dingo\Api\Http\FormRequest;

class StoreRiderRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
        ];
    }
}
