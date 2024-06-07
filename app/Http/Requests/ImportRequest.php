<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

use function Laravel\Prompts\password;
use Illuminate\Foundation\Http\FormRequest;
use Whoops\Run;

class ImportRequest extends FormRequest
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
            'file' => 'required|mimes:xlsx,xls,csv'
        ];
    }
}
