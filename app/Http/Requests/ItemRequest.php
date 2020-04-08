<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            // 'item_title' => ['required','min:0','max:10'],
            'item_title' => ['nullable'],
            'item_content' => ['nullable'],

            /*
            // バリデーションルール
            */
        ];
    }

    public function messages(){
        return [
            // 'item_title.required' => 'タイトルを入力してください。',
        ];
    }
}
