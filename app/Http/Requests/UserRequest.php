<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        request()->flash();
        $rules = [];
        $rules["name"] = ["required", "string"];
        $rules["email"] = ["required", "email", $this->user() ? Rule::unique('users')->ignore($this->user()->id) : "unique:users,email"];
        $rules["password"] = [$this->user() ? "sometimes" : "required", "confirmed"];

        return $rules;
    }
}