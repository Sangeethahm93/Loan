@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        Income and Bank Details
    </div>

    <div class="card-body">
        @if($user['bank_income_details'])
            <a class="btn btn-info mx-auto" href="{{ route('profile.income-bank.show', $userIncomeBankDetail[0]['id']) }}">View Full Details</a>
            <div class="form-group mt-4">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>Monthly Salary</th>
                            <td>RS. {{ $userIncomeBankDetail[0]['monthly_salary'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @else
            <a class="btn btn-info mx-auto" href="{{ route("profile.income-bank.create") }}">Add Income and Bank Details</a>
        @endif
    </div>
</div>

@endsection

@section('scripts')
@parent
@endsection