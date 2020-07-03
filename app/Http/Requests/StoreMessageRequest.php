<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => [                   // Правила валидации для поля title.
                'max:32',                  // Длина не более 32 Б.
                'min:1',                   // Длина не менее 1 Б.
                'regex:/^[ \dа-яё-]+$/iu', // Допускаются пробелы, русские буквы, цифры, дефисы.
                'required',                // Поле должно быть заполнено.
                'unique:messages',         // Не должно повторяться в таблице messages.
            ],
            'content' => [                 // Правила валидации для поля content.
                'max:2048',                // Длина не более 2048 Б.
                'min:1',                   // Длина не менее 1 Б.
                'required',                // Поле должно быть заполнено.
            ],
        ];
    }
}
