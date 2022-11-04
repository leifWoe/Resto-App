<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required'],
            'image' => ['required', 'image'],
            'price' => ['required'],
            'description' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'image.required' => 'Image is required!',
            'price.required' => 'Price is required!',
            'description.required' => 'Description is required!',
            'category.required' => 'Category is required!',
        ];
    }
}
