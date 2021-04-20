@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        User Additional Details
    </div>

    <div class="card-body">
        @if($user['additional_details'])
            <a class="btn btn-info mx-auto" href="{{ route('profile.additional-details.edit', $userAdditionalDetail['id']) }}">Edit Occupation Details</a>
            <div class="form-group mt-4">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>Monthly Salary</th>
                            <td>{{ $userAdditionalDetail['no_of_houses'] }}</td>
                        </tr>
                        <tr>
                            <th>Annual Turnover</th>
                            <td>{{ $userAdditionalDetail['lands'] }}</td>
                        </tr>
                        <tr>
                            <th>Net Profit</th>
                            <td>{{ $userAdditionalDetail['no_of_vehicles'] }}</td>
                        </tr>
                        <tr>
                            <th>Other Income</th>
                            <td>{{ $userAdditionalDetail['other_property'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @else
            <a class="btn btn-info mx-auto" href="{{ route("profile.additional_details.create") }}">Add Personal Details</a>
        @endif
    </div>
</div>

@endsection

@section('scripts')
@parent
@endsection