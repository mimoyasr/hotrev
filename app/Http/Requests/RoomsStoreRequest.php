<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomsStoreRequest extends FormRequest
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
            //
            'number'=> 'required|min:4|unique:rooms',
            'capacity'=> 'required|integer',
            'price'=> 'required|integer',
            'floor' => 'required|exists:floors,id'
        ];
    }
}
