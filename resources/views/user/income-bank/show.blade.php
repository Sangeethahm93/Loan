@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        User Occupation Details
    </div>

    <div class="card-body">
        @if($user['bank_income_details'])
            <a class="btn btn-info mx-auto" href="{{ route('profile.occupation.edit', $userIncomeBankDetail['id']) }}">Edit Occupation Details</a>
            <div class="form-group mt-4">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>Monthly Salary</th>
                            <td>{{ $userIncomeBankDetail['monthly_salary'] }}</td>
                        </tr>
                        <tr>
                            <th>Annual Turnover</th>
                            <td>{{ $userIncomeBankDetail['annual_turnover'] }}</td>
                        </tr>
                        <tr>
                            <th>Net Profit</th>
                            <td>{{ $userIncomeBankDetail['net_profit'] }}</td>
                        </tr>
                        <tr>
                            <th>Other Income</th>
                            <td>{{ $userIncomeBankDetail['other_income'] }}</td>
                        </tr>
                        <tr>
                            <th>Other Income Source</th>
                            <td>{{ $userIncomeBankDetail['other_income_source_rental'] }} {{ $userIncomeBankDetail['other_income_source_agricultural'] }} {{ $userIncomeBankDetail['other_income_source_other'] }}</td>
                        </tr>
                        <tr>
                            <th>Account Number</th>
                            <td>{{ $userIncomeBankDetail['account_number'] }}</td>
                        </tr>
                        <tr>
                            <th>Bank Name</th>
                            <td>{{ $userIncomeBankDetail['bank_name'] }}</td>
                        </tr>
                        <tr>
                            <th>Branch</th>
                            <td>{{ $userIncomeBankDetail['branch'] }}</td>
                        </tr>
                        <tr>
                            <th>Customer Id</th>
                            <td>{{ $userIncomeBankDetail['customer_id'] }}</td>
                        </tr>
                        <tr>
                            <th>Account Type</th>
                            <td>{{ $userIncomeBankDetail['account_type'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @else
            <a class="btn btn-info mx-auto" href="{{ route("profile.occupation.create") }}">Add Personal Details</a>
        @endif
    </div>
</div>

@endsection

@section('scripts')
@parent
@endsection