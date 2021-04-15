@extends('layouts.admin')

@section('content')
@if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
<div class="card">
    <div class="card-header">
        <b>KYC Documents</b>
    </div>

    <div class="card-body">
        
        <form method="POST" action="{{ route("profile.kyc-document.store") }}" enctype="multipart/form-data">
            @csrf
            
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="kyc_documents">Select Documents Type:</label>
                    </div>
                    <div class="col-md-9">
                        <select name="kyc_document_type[]" id="kyc_documents" class="kyc_documents_Type form-control mb-3">
                            <option value="">Select Option</option>
                            <option value="Passport">Passport</option>
                            <option value="Adhar Card">Adhar Card</option>
                            <option value="Pan Card">Pan Card</option>
                            <option value="Driving Licence">Driving Licence</option>
                            <option value="Voter ID">Voter ID</option>
                        </select>
                        <input type="file" name="kyc_file[]" class="mb-3">
                        @error('kyc_document_type') <span class="error">{{ $message }}</span> @enderror
                        <div id="add_documnets"></div>
                        <button type="button" class="add_more_documnets btn btn-success">Add More Documents</button>
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

@section('scripts')
@parent
@endsection