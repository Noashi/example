<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{   
    protected $redirectRoute = "index";

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
            'fullname' => 'required|max:200',
            'gender' => 'required|numeric|between:1,2',
            'age_id' => 'required|numeric|between:1,6',
            'is_sent_email' => 'required|numeric|between:0,1',
            'email' => 'required|email',
            'feedback' => 'max:200',
        ];
    }
}
