<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            "title"         => "required|string",
            "subtitle"      => "required|string",
            "language"      => "required|string",
            "level"         => "required|string",
            "category_id"   => "required|string",
            "price_type"    => "required|string",
            "price"         => "required|numeric",
            "sale_prices"   => "required|numeric",
            "thumbnail"     => "required|file|mimes:jpeg,jpg,png"
        ];
    }
}
