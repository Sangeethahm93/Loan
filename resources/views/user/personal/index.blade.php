@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        Personal Details
    </div>

    <div class="card-body">
        @if($user['personal_details'])
            <a class="btn btn-info mx-auto" href="{{ route('profile.personal.show', $userPersonalDetail[0]['id']) }}">View Full Details</a>
            <div class="form-group mt-4">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>Applicant Name</th>
                            <td>{{ $userPersonalDetail[0]['applicant_name'] }}</td>
                        </tr>
                        <tr>
                            <th>Father / Husband Name</th>
                            <td>{{ $userPersonalDetail[0]['father_or_husband_name'] }}</td>
                        </tr>
                        <tr>
                            <th>Date of Birth</th>
                            <td>{{ $userPersonalDetail[0]['date_of_birth'] }}</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>{{ $userPersonalDetail[0]['gender'] }}</td>
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