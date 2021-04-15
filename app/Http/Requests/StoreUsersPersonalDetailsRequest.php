<?php

namespace App\Http\Requests;

use App\UserPersonalDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreUsersPersonalDetailsRequest extends FormRequest
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
            'applicant_name' => [
                'required',
            ],
            'father_or_husband_name' => [
                'required',
            ],
            'date_of_birth' => [
                'required',
            ],
            'gender'  => [
                'required',
            ],
            'married_status' => [
                'required',
            ],
            'religion'  => [
                'required',
            ],
            'mobile_no' => [
                'required',
                'min:10',
                'max:10'
            ],
            'pan_no'  => [
                'required',
                'min:10',
                'max:10'
            ],
            'adhar_no'    => [
                'required',
                'min:12',
                'max:12'
            ],
            'education_type'  => [
                'required',
            ],
            'pre_address_line_one' => [
                'required',
            ],
            'pre_address_line_two' => [
                'required',
            ],
            'pre_country' => [
                'required',
            ],
            'pre_state' => [
                'required',
            ],
            'pre_city' => [
                'required',
            ],
            'pre_zipcode' => [
                'required',
                'min:6',
                'max:6'
            ],
            'per_address_line_one' => [
                'required',
            ],
            'per_address_line_two' => [
                'required',
            ],
            'per_country' => [
                'required',
            ],
            'per_state' => [
                'required',
            ],
            'per_city' => [
                'required',
            ],
            'per_zipcode' => [
                'required',
                'min:6',
                'max:6'
            ],
        ];
    }
}
