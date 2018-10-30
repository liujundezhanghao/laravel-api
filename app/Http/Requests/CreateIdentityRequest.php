<?php

namespace App\Http\Requests;

use App\Exceptions\ApiException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateIdentityRequest extends FormRequest
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
            'real_name' => 'required',
            'id_card'   => 'required',
            'mobile'    => 'required',
            'yzm'       => 'required',
        ];
    }

    public function messages()
    {
        return [
            'real_name.required' => '姓名是必填的~',
            'id_card.required'   => '身份证号码是必填的~',
            'mobile.required'    => '手机号是必填的',
            'yzm.required'       => '验证码是必填的',
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
