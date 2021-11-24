<?php

namespace Veldman\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserGroupRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255']
        ];
    }
}
