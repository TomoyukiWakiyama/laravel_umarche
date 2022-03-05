<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadImageRequest extends FormRequest
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
            //
            'image'=>'image|mimes:jpg,jpeg,png|max:2048',
        ];
    }
    public function message()
    {
        return [
            'image' => '選択されたデータは画像ファイルではありません。',
            'mines' => '拡張子はjpg/jpeg/pngで指定してください。',
            'max' => 'ファイルサイズが２MBを超えています',
        ];
    }
}
