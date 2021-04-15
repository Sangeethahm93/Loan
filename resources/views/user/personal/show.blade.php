@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        Personal Details
    </div>

    <div class="card-body">
        @if($user['personal_details'])
            <a class="btn btn-info mx-auto" href="{{ route('profile.personal.edit', $userPersonalDetail['id']) }}">Edit Personal Details</a>
            <div class="form-group mt-4">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>Applicant Name</th>
                            <td>{{ $userPersonalDetail['applicant_name'] }}</td>
                        </tr>
                        <tr>
                            <th>Father / Husband Name</th>
                            <td>{{ $userPersonalDetail['father_or_husband_name'] }}</td>
                        </tr>
                        <tr>
                            <th>Date of Birth</th>
                            <td>{{ $userPersonalDetail['date_of_birth'] }}</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>{{ $userPersonalDetail['gender'] }}</td>
                        </tr>
                        <tr>
                            <th>Married Status</th>
                            <td>{{ $userPersonalDetail['married_status'] }}</td>
                        </tr>
                        <tr>
                            <th>Religion</th>
                            <td>{{ $userPersonalDetail['religion'] }}</td>
                        </tr>
                        <tr>
                            <th>Mobile Number</th>
                            <td>{{ $userPersonalDetail['mobile_no'] }}</td>
                        </tr>
                        <tr>
                            <th>Pancard Number</th>
                            <td>{{ $userPersonalDetail['pan_no'] }}</td>
                        </tr>
                        <tr>
                            <th>Adhar Card Number</th>
                            <td>{{ $userPersonalDetail['adhar_no'] }}</td>
                        </tr>
                        <tr>
                            <th>Education</th>
                            <td>{{ $userPersonalDetail['education_type'] }}</td>
                        </tr>
                        <tr>
                            <th>Present Address</th>
                            <td>{{ $userPersonalDetail['pre_address_line_one'] }} , {{ $userPersonalDetail['pre_address_line_two'] }}, {{ $preCity['name'] }}, {{ $preState['name'] }}, {{ $preCountry['name'] }}, {{ $userPersonalDetail['pre_zipcode'] }}</td>
                        </tr>
                        <tr>
                            <th>Permananet Address</th>
                            <td>{{ $userPersonalDetail['per_address_line_one'] }} , {{ $userPersonalDetail['per_address_line_two'] }}, {{ $perCity['name'] }}, {{ $perState['name'] }}, {{ $perCountry['name'] }}, {{ $userPersonalDetail['pre_zipcode'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @else
            <a class="btn btn-info mx-auto" href="{{ route("profile.personal.create") }}">Add Personal Details</a>
        @endif
    </div>
</div>

@endsection

@section('scripts')
@parent
@endsection