<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveFactura extends FormRequest
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
        return $this->myRules();
    }

    public function myRules(){
        return [
            'client_id' => 'required',
            'name'=> 'required|string|max:2000',
            'lastname'=> 'required|string|max:2000',
            'email'=> 'required|string|max:2000',
            'address'=> 'required|string|max:2000',
            'phone'=>'required|integer|max:10',
            'book'=>'required',
            'total' => 'required|integer'
        ];
    }
}
