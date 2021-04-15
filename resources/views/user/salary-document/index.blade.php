@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        Salary Documents
    </div>

    <div class="card-body">
        @if($user['salary_documents'])
            <div class="form-group mt-4">
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
                        @foreach($userSalaryDocuments as $userSalaryDocument)
                            <tr>
                                <td>{{ $userSalaryDocument->salary_document_type }}</td>
                                <td>{{ $userSalaryDocument->salary_file }}</td>
                                <td>{{ $userSalaryDocument->status }}</td>
                                <td><button class="btn btn-xs btn-info">Edit</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <a class="btn btn-info mx-auto" href="{{ route("profile.salary-document.create") }}">Upload Salary Documents</a>
        @endif
    </div>
</div>
@endsection