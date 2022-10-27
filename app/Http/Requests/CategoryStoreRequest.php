<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest{

    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required'],
            'image' => ['required'],
            'description' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'state' => 409,
            'name.required' => 'Name is required!',
            'image.required' => 'Image is required!',
            'description.required' => 'Description is required!'
        ];
    }
}
