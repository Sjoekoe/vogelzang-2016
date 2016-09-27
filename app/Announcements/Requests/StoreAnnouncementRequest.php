<?php
namespace App\Announcements\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnnouncementRequest extends FormRequest
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
            'body' => 'required',
        ];
    }
}
