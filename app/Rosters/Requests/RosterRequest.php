<?php
namespace App\Rosters\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'name' => 'required',
            'date' => 'required|date_format:d/m/Y',
            'limit' => 'integer|min:0',
        ];
    }
}
