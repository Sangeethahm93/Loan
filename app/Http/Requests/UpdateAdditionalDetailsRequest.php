<?php

namespace App\Http\Requests;

use App\UserAdditionalDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateAdditionalDetailsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('user_profile_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'no_of_houses' => [
                'required',
            ],
            'lands' => [
                'required',
            ],
            'no_of_vehicles' => [
                'required',
            ],
            'other_property' => [
                'required',
            ]
        ];
    }
}
