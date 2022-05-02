<?php

namespace Veldman\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'roles' => ['nullable', 'array', 'exists:roles,id'],
            'permissions' => ['nullable', 'array', 'exists:permissions,id']
        ];
    }
}
