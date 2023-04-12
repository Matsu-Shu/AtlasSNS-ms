<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewPost extends FormRequest
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
            'newPost' => ['required','min:1','max:150'],
        ];
    }

    //  バリデーション項目名定義 日本語に変換
    // public function attributes()
    // {
    //     return [
    //         'post' => '投稿',
    //     ];
    // }

    //  [Validationメッセージの設定 ]
    // function名は必ず「messages」となります。
    // public function messages(){
    //     return [
    //         'required' => ':attributeを入力してください。',
    //         'max' => ':attributeは:max文字以内で入力してください。',
    //     ];
    // }
}
