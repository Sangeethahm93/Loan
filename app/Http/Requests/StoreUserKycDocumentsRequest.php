<?php

namespace App\Http\Requests;

use App\UserKYCDocument;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreUserKycDocumentsRequest extends FormRequest
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
            'kyc_document_type.*' => [
                'required',
            ],
            'kyc_file' => [
                'required',
            ],
            'kyc_file.*' => [
                'mimes:doc,pdf,docx,zip,png,jpeg,jpg',
            ]
        ];
    }
}
