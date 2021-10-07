<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CityRequest extends FormRequest
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
                    'name' => ['required', Rule::unique('cities')]
                ];

            }
            case "PUT":
            {
                return [
                    'name' => ['required', Rule::unique('cities')->ignore($this->city)]
                ];

            }
        }
    }
}
