<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|string|max:255',
            'price'=>'required|numeric',
            'quantity'=>'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id'=>'required|exists:categories,id',
            'description'=>'required|string',
            'status'=>'required|boolean'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'name.string' => 'Name must be a string',
            'name.max' => 'Name must be less than 255 characters',
            'price.required' => 'Price is required',
            'price.numeric' => 'Price must be a number',
            'quantity.required' => 'Quantity is required',
            'quantity.numeric' => 'Quantity must be a number',
            'image.required' => 'Image is required',
            'image.image' => 'Image must be an image',
            'description.required' => 'Description is required',
            'description.string' => 'Description must be a string',
            'category_id.required' => 'Category is required',
            'category_id.exists' => 'Category not found',
            'status.required' => 'Status is required',
            'status.boolean' => 'Status must be a boolean',
        ];
    }
}
