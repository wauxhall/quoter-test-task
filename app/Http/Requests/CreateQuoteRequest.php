<?php

namespace App\Http\Requests;

use App\Exceptions\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class CreateQuoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'text' => 'required|min:5|max:4096',
            'author_name' => 'required|string|min:3|max:255',
            'tag_ids' => 'required|array|max:3',
            'tag_ids.*' => 'required|int|exists:tags,id'
        ];
    }

    /**
     * Custom error messages
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'required' => 'Поле ":attribute" обязательно к заполнению',
            'min' => 'Длина поля ":attribute" должна быть не меньше :min',
            'max' => 'Длина поля ":attribute" должна быть не больше :max',
            'string' => 'Поле ":attribute" должно быть строкой',
            'array' => 'Поле ":attribute" должно быть массивом',
            'tag_ids.*.int' => 'Массив тегов должен содержать только числа',
            'tag_ids.*.exists' => 'Массив тегов содержит несуществующий элемент'
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'text' => 'текст цитаты',
            'author_name' => 'автор',
            'tag_ids' => 'список тегов'
        ];
    }

    /**
     * @param Validator $validator
     * @throws ValidationException
     */
    public function failedValidation(Validator $validator): void
    {
        $errors = $validator->errors()->toArray();
        $message = $errors[array_keys($errors)[0]][0];

        throw new ValidationException($message);
    }
}
