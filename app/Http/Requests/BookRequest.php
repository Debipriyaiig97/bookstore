<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title' => 'required',
            'published' => 'required|date',
            'image' => 'required|image',
            'author' => 'required',
            'publisher' => 'required',
            'description' => 'required',
            'genre' => 'required',
            'isbn' => 'required|numeric',
        ];
    }
}
