@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        Additioanal Details
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
            <form method="POST" action="{{ route("profile.additional-details.store") }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2 pr-0">
                            <label for="no_of_houses">Houses:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="no_of_houses" class="form-control" id="no_of_houses" />
                            @error('no_of_houses') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2 pr-0">
                            <label for="lands">Lands:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="lands" class="form-control" id="lands" />
                            @error('lands') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>         
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2 pr-0">
                            <label for="no_of_vehicles">Vehicles:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="no_of_vehicles" class="form-control" id="no_of_vehicles" />
                            @error('no_of_vehicles') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>         
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2 pr-0">
                            <label for="other_property">Other Property:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="other_property" class="form-control" id="other_property" />
                            @error('other_property') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
            {{-- <a class="btn btn-info mx-auto" href="{{ route("profile.additional-details.create") }}">Add Income and Bank Details</a> --}}
        @endif
    </div>
</div>

@endsection

@section('scripts')
@parent
@endsection