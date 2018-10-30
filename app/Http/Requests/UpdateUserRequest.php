<?php

namespace App\Http\Requests;

use App\Exceptions\ApiException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'nickname' => 'between:1,6',
            'user_img' => 'filled',
        ];
    }

    public function messages()
    {
        return [
            'nickname.between' => '昵称必须1至6个字符~',
            'user_img.filled' => '图片不能为空~',
        ];
    }

    /**
     * 错误返回
     *
     * @param Validator $validator
     * @throws ApiException
     */
    protected function failedValidation(Validator $validator)
    {
        if ($validator->fails()) {
            $message = $validator->errors()->first();

            throw new ApiException($message);
        }
        return;
    }
}
