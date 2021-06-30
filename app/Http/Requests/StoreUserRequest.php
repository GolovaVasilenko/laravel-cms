<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class StoreUserRequest extends FormRequest
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
            'name'     => 'required',
            'email'    => 'required|email',
            'password' => 'required',
            'avatar'   => 'nullable',
            'info'     => 'nullable'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'password' => Hash::make($this->password),
        ]);
    }
}
