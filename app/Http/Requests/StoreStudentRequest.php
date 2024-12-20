<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
        //validation

        // if ($this->method() === 'POST') {
        //     return [
        //         'studentName' => "required|string|unique:students,studentName,{$this->studentName}",
        //         'studentEmail' => 'required|unique:students,studentEmail',
        //         'studentPhone' => 'required|numeric',
        //         // 'studentPhone' => 'required|numeric|between:1,10',
        //         'studentAddress' => 'required|string',
        //         'studentImage' => 'nullable|required',
        //         // 'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        //     ];

        //     // $request->validate([
        // //     'field' => 'required|numeric|between:1,10',
        // // ], [
        // //     'field.between' => 'The :attribute must be between 1 and 10.',
        // // ]);
        // } else {
        //     return [
        //         'name' => "required|unique:categories,name,{$this->category->slug}"
        //     ];
        // }

        return [
            'studentName' => "required|string|unique:students,studentName"
        ];
    }
}
