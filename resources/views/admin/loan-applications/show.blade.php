@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.loanApplication.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.loan-applications.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.loanApplication.fields.id') }}
                        </th>
                        <td>
                            {{ $loanApplication->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loanApplication.fields.loan_amount') }}
                        </th>
                        <td>
                            {{ $loanApplication->loan_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loanApplication.fields.description') }}
                        </th>
                        <td>
                            {{ $loanApplication->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loanApplication.fields.status') }}
                        </th>
                        <td>
                            {{ $user->is_user && $loanApplication->status_id < 8 ? $defaultStatus->name : $loanApplication->status->name }}
                        </td>
                    </tr>
                    @if($user->is_admin)
                        <tr>
                            <th>
                                {{ trans('cruds.loanApplication.fields.analyst1') }}
                            </th>
                            <td>
                                {{ $loanApplication->analystOne->name ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.loanApplication.fields.analyst2') }}
                            </th>
                            <td>
                                {{ $loanApplication->analystTwo->name ?? '' }}
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <div class="form-group">
                @if($user->is_admin && in_array($loanApplication->status_id, [1, 3, 4]))
                    <a class="btn btn-success" href="{{ route('admin.loan-applications.showSend', $loanApplication->id) }}">
                        Send to
                        @if($loanApplication->status_id == 1)
                            Analyst One
                        @else
                            Analyst Two
                        @endif
                    </a>
                @elseif(($user->is_analystOne && $loanApplication->status_id == 2) || ($user->is_analystTwo && $loanApplication->status_id == 5))
                    <a class="btn btn-success" href="{{ route('admin.loan-applications.showAnalyze', $loanApplication->id) }}">
                        Submit analysis
                    </a>
                @endif

                @if(Gate::allows('loan_application_edit') && in_array($loanApplication->status_id, [6,7]))
                    <a class="btn btn-info" href="{{ route('admin.loan-applications.edit', $loanApplication->id) }}">
                        {{ trans('global.edit') }}
                    </a>
                @endif

                @can('loan_application_delete')
                    <form action="{{ route('admin.loan-applications.destroy', $loanApplication->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-danger" value="{{ trans('global.delete') }}">
                    </form>
                @endcan
            </div>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.loan-applications.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection