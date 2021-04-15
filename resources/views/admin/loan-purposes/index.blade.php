@extends('layouts.admin')
@section('content')
@can('loan_purpose_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.loan-purposes.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.loanPurpose.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.loanPurpose.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-LoanPurpose">
                <thead>
                    <tr>
                        <th>
                            {{ trans('cruds.loanPurpose.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.loanPurpose.fields.name') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($loanPurposes as $key => $loanPurpose)
                        <tr data-entry-id="{{ $loanPurpose->id }}">
                            <td>
                                {{ $loanPurpose->id ?? '' }}
                            </td>
                            <td>
                                {{ $loanPurpose->name ?? '' }}
                            </td>
                            <td>
                                @can('loan_purpose_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.loan-purposes.show', $loanPurpose->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('loan_purpose_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.loan-purposes.edit', $loanPurpose->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('loan_purpose_delete')
                                    <form action="{{ route('admin.loan-purposes.destroy', $loanPurpose->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection