<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */


    public function rules(): array  // Validation Of Product Controller
    {
        return [
            'name'        => 'required|max:70',
            'price'       => 'required|numeric',
            'image'       => 'required|image',
            'size'        =>'required',
            'category_id' => 'required'
        ];
    }

    public function messages()     // the messages of errors
    {
        return [
            'name.required' => 'please enter your name.',
            'name.max'      => 'name must be less than 70 char.',
        
            'price.required' =>'please enter the price.',
            'price.numeric'  => 'price must be a Number.',
        
            'image.required' => 'please uplode the image.',
        
            'size.required'  => 'please enter the size.'
        ];
    }


}
