<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class PhotoRequest extends Request
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
        return [
           /* 'title' => 'required|min:2|max:255',
            'filename' => 'required|min:3|max:255',
            'url' => 'required|min:2|max:255' */
        ];
    }

}
