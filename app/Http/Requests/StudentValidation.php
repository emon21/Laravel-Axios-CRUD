<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentValidation extends FormRequest
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

        if ($this->method() === 'POST') {
            return [
                'studentName' => 'require|string|unique:students,studentName',
                'studentEmail' => 'require|unique:students,studentEmail',
                'studentPhone' => 'require|number',
                'studentAddress' => 'require|string',
                'studentImage' => 'require',
            ];
        } else {
            return [
                'name' => "require|unique:categories,name,{$this->category->slug}"
            ];
        }
    }
}
