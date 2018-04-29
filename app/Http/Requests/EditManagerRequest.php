<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditManagerRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => [Rule::unique('users')->ignore($this->user_id),'required','string','email','max:255'],
            'password' => 'required|string|min:6',
            'national_id'=> Rule::unique('managers')->ignore($this->id),
            'photo'=>'mimes:jpeg,jpg'
        ];
    }
}
