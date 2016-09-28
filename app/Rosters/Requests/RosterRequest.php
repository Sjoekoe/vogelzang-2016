<?php
namespace App\Rosters\Requests;


use Dingo\Api\Http\FormRequest;

class RosterRequest extends FormRequest
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
            'date' => 'required|date_format:d-m-Y',
            'limit' => 'required|min:0',
            'time' => 'required|date_format:H:i',
        ];
    }
}
