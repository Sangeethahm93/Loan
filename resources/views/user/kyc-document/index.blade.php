@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        KYC Documents
    </div>

    <div class="card-body">
        @if($user['kyc_documents'])
            <div class="form-group mt-4">
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
                        @foreach($userKYCDocuments as $userKYCDocument)
                            <tr>
                                <td>{{ $userKYCDocument->kyc_document_type }}</td>
                                <td>{{ $userKYCDocument->kyc_file }}</td>
                                <td>{{ $userKYCDocument->status }}</td>
                                <td><button class="btn btn-xs btn-info">Edit</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <a class="btn btn-info mx-auto" href="{{ route("profile.kyc-document.create") }}">Upload Documents</a>
        @endif
    </div>
</div>
@endsection