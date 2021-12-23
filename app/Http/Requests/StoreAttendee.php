<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAttendee extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'number' => 'required',
            'dep_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名前が未入力です',
            'number.required' => '社員番号が未入力です',
            'dep_id.required' => '部署が未選択です',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(response()->json([
            'message' => 'Failed validation',
            'errors' => $errors,
        ], 422, [], JSON_UNESCAPED_UNICODE));
    }
}
