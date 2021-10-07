<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientRequest extends FormRequest
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
                    'cod' => ['required','numeric', Rule::unique('clients')],
                    'name' => ['required'],
                    'city_id' => ['required', Rule::exists('cities', 'id')],
                ];

            }
            case "PUT":
            {
                return [
                    'cod' => ['required', Rule::unique('clients')->ignore($this->client)],
                    'name' => ['required'],
                    'city_id' => ['required', Rule::exists('cities', 'id')],
                ];

            }
        }
    }
}
