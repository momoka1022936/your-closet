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
            'image' => 'required|image',
            'name' => 'max:30',
        ];
    }

    /**
     * エラーメッセージのカスタマイズ
     * 
     * @return array
     */
    public function messages()
    {
        return [
            'image.required' => '画像は必ず選択してください。'
        ];
    }
}
