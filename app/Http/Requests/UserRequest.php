<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'login' => 'required|string|min:2|max:255|regex:/[A-Za-z0-9]+/',
            'password' => 'string|min:5|max:255|regex:/^[A-Za-zА-ЯЁа-яё0-9]+$/',
        ];
    }

}
