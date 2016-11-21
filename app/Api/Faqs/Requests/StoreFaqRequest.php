<?php
namespace App\Api\Faqs\Requests;

use Dingo\Api\Http\FormRequest;

class StoreFaqRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'content' => 'required',
        ];
    }
}
