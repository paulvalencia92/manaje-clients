<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        switch ($this->method()) {
            case "POST":
            {
                return [
                    'name' => ['required'],
                    'email' => ['required', Rule::unique('users')],
                    'picture' => ['nullable'],
                ];

            }
            case "PUT":
            {
                return [
                    'name' => ['required'],
                    'email' => ['required', Rule::unique('users')->ignore($this->user)],
                    'picture' => ['nullable'],
                ];

            }
        }
    }
}
