@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.user.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 p-0">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
                                <a class="nav-item nav-link" id="nav-occupation-tab" data-toggle="tab" href="#nav-occupation" role="tab" aria-controls="nav-occupation" aria-selected="false">Occupation</a>
                                <a class="nav-item nav-link" id="nav-income-tab" data-toggle="tab" href="#nav-income" role="tab" aria-controls="nav-income" aria-selected="false">Bank Income</a>
                                <a class="nav-item nav-link" id="nav-document-tab" data-toggle="tab" href="#nav-document" role="tab" aria-controls="nav-document" aria-selected="false">Documents</a>
                                <a class="nav-item nav-link" id="nav-loan-tab" data-toggle="tab" href="#nav-loan" role="tab" aria-controls="nav-loan" aria-selected="false">Loan Details</a>
                                <a class="nav-item nav-link" id="nav-additional-tab" data-toggle="tab" href="#nav-additional" role="tab" aria-controls="nav-additional" aria-selected="false">Additional Details</a>
                            </div>
                        </nav>
                        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <th>{{ trans('cruds.user.fields.id') }}</th>
                                            <td>{{ $user->id }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('cruds.user.fields.name') }}</th>
                                            <td>{{ $user->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('cruds.user.fields.email') }}</th>
                                            <td>{{ $user->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('cruds.user.fields.email_verified_at') }}</th>
                                            <td>{{ $user->email_verified_at }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('cruds.user.fields.roles') }}</th>
                                            <td>
                                                @foreach($user->roles as $key => $roles)
                                                    <span class="label label-info">{{ $roles->title }}</span>
                                                @endforeach
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                @if($user->personal_details) 
                                    @foreach($userPersonalDetails as $key => $personal)
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th>Applicant Name</th>
                                                    <td>{{ $personal->applicant_name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Father/Husband Name</th>
                                                    <td>{{ $personal->father_or_husband_name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Date of Birth</th>
                                                    <td>{{ $personal->date_of_birth }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Gender</th>
                                                    <td>{{ $personal->gender }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Married Status</th>
                                                    <td>{{ $personal->married_status }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Religion</th>
                                                    <td>{{ $personal->religion }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Mobile Number</th>
                                                    <td>{{ $personal->mobile_no }}</td>
                                                </tr>
                                                <tr>
                                                    <th>PAN Number</th>
                                                    <td>{{ $personal->pan_no }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Adhar Number</th>
                                                    <td>{{ $personal->adhar_no }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Education Type</th>
                                                    <td>{{ $personal->education_type }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Present Address</th>
                                                    <td>{{ $personal->pre_address_line_one }} {{ $personal->pre_address_line_two }} {{ $personal->pre_city_name }} {{ $personal->pre_state_name }} {{ $personal->pre_country_name }} {{ $personal->pre_zipcode }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Permanent Address</th>
                                                    <td>{{ $personal->per_address_line_one }} {{ $personal->per_address_line_two }} {{ $personal->per_city_name }} {{ $personal->per_state_name }} {{ $personal->per_country_name }} {{ $personal->per_zipcode }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    @endforeach
                                @else 
                                    <p>No Personal Details Added</p>
                                @endif
                            </div>
                            <div class="tab-pane fade" id="nav-occupation" role="tabpanel" aria-labelledby="nav-occupation-tab">
                                @if($user->occupation) 
                                    @foreach($userOccupationDetails as $key => $occupation)
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th>Occupation</th>
                                                    <td>{{ $occupation->occupation }}</td>
                                                </tr>
                                                @if($occupation->occupation == 'Salaried')
                                                    <tr>
                                                        <th>Type of Company</th>
                                                        <td>{{ $occupation->salried_occupation_company_type }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Type of Industry</th>
                                                        <td>{{ $occupation->salried_occupation_industry_type }}</td>
                                                    </tr>
                                                @elseif($occupation->occupation == 'Self Employeed')
                                                    <tr>
                                                        <th>Type of Company</th>
                                                        <td>{{ $occupation->self_employeed_company_type }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nature of Business</th>
                                                        <td>{{ $occupation->self_employeed_business }}</td>
                                                    </tr>
                                                @elseif($occupation->occupation == 'Self Employeed Professional')
                                                    <tr>
                                                        <th>Profession</th>
                                                        <td>{{ $occupation->self_employeed_professional }}</td>
                                                    </tr>
                                                @elseif($occupation->occupation == 'Other')
                                                    <tr>
                                                        <th>Other Occupation Type</th>
                                                        <td>{{ $occupation->other_occupation }}</td>
                                                    </tr>
                                                @endif
                                                <tr>
                                                    <th>Designation</th>
                                                    <td>{{ $occupation->designation }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Current Job Experience</th>
                                                    <td>{{ $occupation->current_job_experience }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Total Experience</th>
                                                    <td>{{ $occupation->total_experience }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Company Name</th>
                                                    <td>{{ $occupation->company_name }}</td>
                                                </tr>
                                                </tr>
                                                <tr>
                                                    <th>Address</th>
                                                    <td>{{ $occupation->address_line_one }} , {{ $occupation->address_line_two }}, {{ $occupation->city }}, {{ $occupation->state }}, {{ $occupation->country }}, {{ $occupation->zipcode }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Telephone Number</th>
                                                    <td>{{ $occupation->tel_no }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Telephone Number</th>
                                                    <td>{{ $occupation->tel_no }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Company Email</th>
                                                    <td>{{ $occupation->company_email }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    @endforeach
                                @else 
                                    <p>No Occupation Details Added</p>
                                @endif
                            </div>
                            <div class="tab-pane fade" id="nav-income" role="tabpanel" aria-labelledby="nav-income-tab">
                                @if($user->bank_income_details)
                                    @foreach($userIncomeBankDetails as $key => $income)
                                        <table class="table table-bordered table-striped">
                                            <tbody>
                                                <tr>
                                                    <th>Monthly Salary</th>
                                                    <td>{{ $income->monthly_salary }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Annual Turnover</th>
                                                    <td>{{ $income->annual_turnover }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Net Profit</th>
                                                    <td>{{ $income->net_profit }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Other Income</th>
                                                    <td>{{ $income->other_income }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Other Income Source</th>
                                                    <td>{{ $income->other_income_source_rental }} {{ $income->other_income_source_agricultural }} {{ $income->other_income_source_other }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Account Number</th>
                                                    <td>{{ $income->account_number }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Bank Name</th>
                                                    <td>{{ $income->bank_name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Branch</th>
                                                    <td>{{ $income->branch }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Customer Id</th>
                                                    <td>{{ $income->customer_id }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Account Type</th>
                                                    <td>{{ $income->account_type }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    @endforeach
                                @else
                                    <p>No Loan Details Added</p>
                                @endif
                            </div>
                            <div class="tab-pane fade" id="nav-document" role="tabpanel" aria-labelledby="nav-document-tab">
                                
                                    <h5>KYC Documents</h5>
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>KYC File Type</th>
                                                <th>File</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($user->kyc_documents)
                                                @foreach($userKYCDocuments as $key => $kycDocument)
                                                    <tr>
                                                        <td>{{ $kycDocument->kyc_document_type }}</td>
                                                        <td>{{ $kycDocument->kyc_file }}</td>
                                                        <td>{{ $kycDocument->status }}</td>
                                                        <td><button class="btn btn-xs btn-info">Change Status</button></td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="4">No KYC Documents</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                
                                <h5>Salary Documents</h5>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Salary File Type</th>
                                            <th>File</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($user->salary_documents)
                                            @foreach($userSalaryDocuments as $key => $salaryDocument)
                                                <tr>
                                                    <td>{{ $salaryDocument->salary_document_type }}</td>
                                                    <td>{{ $salaryDocument->salary_file }}</td>
                                                    <td>{{ $salaryDocument->status }}</td>
                                                    <td><button class="btn btn-xs btn-info">Change Status</button></td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="4">No Salary Documents</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="nav-loan" role="tabpanel" aria-labelledby="nav-loan-tab">
                                @if($user->loan_details)
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($userLoanDetails as $key => $loanDetail)
                                                <tr>
                                                    <td>{{ $loanDetail->existing_loan_bank }}</td>
                                                    <td>{{ $loanDetail->existing_loan_type }}</td>
                                                    <td>{{ $loanDetail->existing_loan_amount }}</td>
                                                    <td>{{ $loanDetail->existing_loan_emi }}</td>
                                                    <td>{{ $loanDetail->existing_loan_tenure }}</td>
                                                    <td>{{ $loanDetail->existing_loan_start_date }}</td>
                                                    <td>{{ $loanDetail->existing_loan_account_number }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p>No Loan Details</p>
                                @endif
                            </div>
                            <div class="tab-pane fade" id="nav-additional" role="tabpanel" aria-labelledby="nav-additional-tab">
                                @if($user->additional_details)
                                    @foreach($userAdditionalDetails as $key => $additional)
                                        <table class="table table-bordered table-striped">
                                            <tbody>
                                                <tr>
                                                    <th>Monthly Salary</th>
                                                    <td>{{ $additional->no_of_houses }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Annual Turnover</th>
                                                    <td>{{ $additional->lands }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Net Profit</th>
                                                    <td>{{ $additional->no_of_vehicles }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Other Income</th>
                                                    <td>{{ $additional->other_property }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    @endforeach
                                @else
                                    <p>No additional details added</p>
                                @endif
                            </div>
                        </div>           
                    </div>
                </div>
            </div>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection