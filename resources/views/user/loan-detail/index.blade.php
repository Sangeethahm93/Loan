@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        Loan Details
    </div>

    <div class="card-body">
        @if($user['loan_details'])
            <div class="form-group mt-4">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Loan Bank</th>
                            <th>Loan Type</th>
                            <th>Loan Amount</th>
                            <th>Loan EMI</th>
                            <th>Loan Tenure</th>
                            <th>Loan Start Date</th>
                            <th>Loan Account Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($userLoanDetails as $loanDetail)
                            <tr>
                                <td>{{ $loanDetail->existing_loan_bank }}</td>
                                <td>{{ $loanDetail->existing_loan_type }}</td>
                                <td>{{ $loanDetail->existing_loan_amount }}</td>
                                <td>{{ $loanDetail->existing_loan_emi }}</td>
                                <td>{{ $loanDetail->existing_loan_tenure }}</td>
                                <td>{{ $loanDetail->existing_loan_start_date }}</td>
                                <td>{{ $loanDetail->existing_loan_account_number }}</td>
                                <td><button class="btn btn-xs btn-info">Edit</button><button class="btn btn-xs btn-danger">Delete</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <a class="btn btn-info mx-auto" href="{{ route("profile.loan-details.create") }}">Add Old Loan Details</a>
        @endif
    </div>
</div>

@endsection

@section('scripts')
@parent
@endsection