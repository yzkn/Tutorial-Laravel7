<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubItemRequest extends FormRequest
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
            'subitem_subtitle' => ['nullable'],
            'subitem_subcontent' => ['nullable'],
            'subitem_item_id' => ['required','exists:App\Item,id'],
            'subitem_filepath' => ['nullable','file']
        ];
    }

    public function messages(){
        return [
            'subitem_item_id.required' => '親アイテムを入力してください。',
            'subitem_item_id.exists:App\Item,id' => '指定された親アイテムが存在しません。',
            'subitem_filepath.file'     => '指定されたファイルが存在しません。',
        ];
    }
}
