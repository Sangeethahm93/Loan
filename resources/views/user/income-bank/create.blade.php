@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        Income and Bank Details
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("profile.income-bank.store") }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            
            <p><b>Income Details</b></p>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="monthly_salary">Monthly Salary:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="monthly_salary" class="form-control" id="monthly_salary" />
                        @error('monthly_salary') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="annual_turnover">Annual Turnover:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="annual_turnover" class="form-control" id="annual_turnover" />
                        @error('annual_turnover') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>         
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="net_profit">Net Profit:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="net_profit" class="form-control" id="net_profit" />
                        @error('net_profit') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>         
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="other_income">Other Income:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="other_income" class="form-control" id="other_income" />
                        @error('other_income') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="other_income_source">Other Income Source:</label>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="checkbox" id="other_income_source_rental" name="other_income_source_rental" value="Rental">
                                <label for="other_income_source_rental">Rental</label><br>
                                <input type="checkbox" id="other_income_source_agricultural" name="other_income_source_agricultural" value="Agricultural">
                                <label for="other_income_source_agricultural">Agricultural</label><br>
                                <input type="checkbox" id="other_income_source_other" name="other_income_source_other" value="Other">
                                <label for="other_income_source_other">Other</label>
                            </div>
                        </div>
                    </div>
                </div>         
            </div>
            <p><b>Bank Details</b></p>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="account_number">Account Number:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="account_number" class="form-control" id="account_number" />
                        @error('account_number') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>         
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="bank_name">Bank Name:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="bank_name" class="form-control" id="bank_name" />
                        @error('bank_name') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="branch">Branch:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="branch" class="form-control" id="branch" />
                        @error('branch') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="customer_id">Customer Id:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="customer_id" class="form-control" id="customer_id" />
                        @error('customer_id') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="account_type">Account Type:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="account_type" class="form-control" id="account_type" />
                        @error('account_type') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
