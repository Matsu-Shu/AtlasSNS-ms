<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//[ *1.変更：default=false ]
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    //[Validationルール記述箇所 ]
    public function rules()
    {
        return [
            'username' => ['required','min:2','max:12'],
            'mail' => ['required','min:5','max:40','present'],
            'password' => ['min:8','max:20','confirmed'],
            // 'password_conf' => ['min:8','max:20'],
            'bio' => ['max:150'],
            'images' => ['image'],
        ];
    }

     //[Validationメッセージの設定 ]
    //function名は必ず「messages」となります。
    // public function messages(){
    //     return [
    //         'username' => '名前を入力してください。',
    //         'mail' => 'mailを入力してください。',
    //         'password' => 'パスワードが一致してません。',
    //         'bio'=> '冊数を入力してください。',
    //         'images' => '冊数は3字以内でお願いします。',
    //     ];
    // }
}
