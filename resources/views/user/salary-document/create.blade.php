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
        <b>Salary Documents</b>
    </div>

    <div class="card-body">
        
        <form method="POST" action="{{ route("profile.salary-document.store") }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="salary_documents">Salary Documents:</label>
                    </div>
                    <div class="col-md-9">
                        <select name="salary_document_type[]" id="salary_documents" class="salary_document_type form-control mb-3">
                            <option value="Salary Slips">Salary Slips</option>
                            <option value="Salary Bank Statements">Salary Bank Statements</option>
                        </select>
                        <input type="file" name="salary_file[]" class="mb-3">
                        @error('salary_documents') <span class="error">{{ $message }}</span> @enderror
                        <div id="add_salary_documents"></div>
                        <button type="button" class="add_more_salary_documnets btn btn-success">Add More Salary Documents</button>
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