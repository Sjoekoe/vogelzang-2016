<?php
namespace App\Articles\Requests;

use Dingo\Api\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
            'title' => 'required',
            'message' => 'required',
        ];
    }
}
