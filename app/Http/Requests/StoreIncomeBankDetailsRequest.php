<?php

namespace App\Http\Requests;

use App\UserIncomeBankDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreIncomeBankDetailsRequest extends FormRequest
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
            'monthly_salary' => [
                'required'
            ],
            'annual_turnover' => [
                'required'
            ],
            'net_profit' => [
                'required'
            ],
            'other_income' => [
                'required'
            ],
            'account_number'=> [
                'required'
            ],
            'bank_name' => [
                'required'
            ],
            'branch' => [
                'required'
            ],
            'customer_id' => [
                'required'
            ],
            'account_type' => [
                'required'
            ]
        ];
    }
}
