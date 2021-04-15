@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        Occupation Details
    </div>

    <div class="card-body">
        @if($user['occupation'])
            <a class="btn btn-info mx-auto" href="{{ route('profile.occupation.show', $userOccupationDetail[0]['id']) }}">View Full Details</a>
            <div class="form-group mt-4">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>Occupation</th>
                            <td>{{ $userOccupationDetail[0]['occupation'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @else
            <a class="btn btn-info mx-auto" href="{{ route("profile.occupation.create") }}">Add Occupation Details</a>
        @endif
    </div>
</div>

@endsection

@section('scripts')
@parent
@endsection