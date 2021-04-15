@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        Additioanal Details
    </div>

    <div class="card-body">
        @if($user['additional_details'])
            <a class="btn btn-info mx-auto" href="{{ route('profile.additional-details.show', $userAdditionalDetail[0]['id']) }}">View Full Details</a>
            <div class="form-group mt-4">
                
            </div>
        @else
            <a class="btn btn-info mx-auto" href="{{ route("profile.additional-details.create") }}">Add Income and Bank Details</a>
        @endif
    </div>
</div>

@endsection

@section('scripts')
@parent
@endsection