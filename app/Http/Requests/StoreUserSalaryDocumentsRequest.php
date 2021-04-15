<?php

namespace App\Http\Requests;

use App\UserSalaryDocument;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreUserSalaryDocumentsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('user_profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'salary_document_type.*' => [
                'required',
            ],
            'salary_file' => [
                'required',
            ],
            'salary_file.*' => [
                'mimes:doc,pdf,docx,zip,png,jpeg,jpg',
            ]
        ];
    }
}
