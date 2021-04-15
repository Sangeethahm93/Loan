@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        User Occupation Details
    </div>

    <div class="card-body">
        @if($user['personal_details'])
            <a class="btn btn-info mx-auto" href="{{ route('profile.occupation.edit', $usersOccupationDetail['id']) }}">Edit Occupation Details</a>
            <div class="form-group mt-4">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>Occupation</th>
                            <td>{{ $usersOccupationDetail['occupation'] }}</td>
                        </tr>
                        @if($usersOccupationDetail['occupation'] == 'Salaried')
                            <tr>
                                <th>Type of Company</th>
                                <td>{{ $usersOccupationDetail['salried_occupation_company_type'] }}</td>
                            </tr>
                            <tr>
                                <th>Type of Industry</th>
                                <td>{{ $usersOccupationDetail['salried_occupation_industry_type'] }}</td>
                            </tr>
                        @elseif($usersOccupationDetail['occupation'] == 'Self Employeed')
                            <tr>
                                <th>Type of Company</th>
                                <td>{{ $usersOccupationDetail['self_employeed_company_type'] }}</td>
                            </tr>
                            <tr>
                                <th>Nature of Business</th>
                                <td>{{ $usersOccupationDetail['self_employeed_business'] }}</td>
                            </tr>
                        @elseif($usersOccupationDetail['occupation'] == 'Self Employeed Professional')
                            <tr>
                                <th>Profession</th>
                                <td>{{ $usersOccupationDetail['self_employeed_professional'] }}</td>
                            </tr>
                        @elseif($usersOccupationDetail['occupation'] == 'Other')
                            <tr>
                                <th>Other Occupation Type</th>
                                <td>{{ $usersOccupationDetail['other_occupation'] }}</td>
                            </tr>
                        @endif
                        <tr>
                            <th>Designation</th>
                            <td>{{ $usersOccupationDetail['designation'] }}</td>
                        </tr>
                        <tr>
                            <th>Current Job Experience</th>
                            <td>{{ $usersOccupationDetail['current_job_experience'] }}</td>
                        </tr>
                        <tr>
                            <th>Total Experience</th>
                            <td>{{ $usersOccupationDetail['total_experience'] }}</td>
                        </tr>
                        <tr>
                            <th>Company Name</th>
                            <td>{{ $usersOccupationDetail['company_name'] }}</td>
                        </tr>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $usersOccupationDetail['address_line_one'] }} , {{ $usersOccupationDetail['address_line_two'] }}, {{ $city['name'] }}, {{ $state['name'] }}, {{ $country['name'] }}, {{ $usersOccupationDetail['zipcode'] }}</td>
                        </tr>
                        <tr>
                            <th>Telephone Number</th>
                            <td>{{ $usersOccupationDetail['tel_no'] }}</td>
                        </tr>
                        <tr>
                            <th>Telephone Number</th>
                            <td>{{ $usersOccupationDetail['tel_no'] }}</td>
                        </tr>
                        <tr>
                            <th>Company Email</th>
                            <td>{{ $usersOccupationDetail['company_email'] }}</td>
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