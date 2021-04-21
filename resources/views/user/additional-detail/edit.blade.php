@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        Edit Additional Details
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("profile.additional-details.update", [$userAdditionalDetail->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="no_of_houses">Houses:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="no_of_houses" class="form-control" id="no_of_houses" value="{{ old('no_of_houses', $userAdditionalDetail->no_of_houses) }}"/>
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
                        <input type="text" name="lands" class="form-control" id="lands" value="{{ old('lands', $userAdditionalDetail->lands) }}"/>
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
                        <input type="text" name="no_of_vehicles" class="form-control" id="no_of_vehicles" value="{{ old('no_of_vehicles', $userAdditionalDetail->no_of_vehicles) }}"/>
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
                        <input type="text" name="other_property" class="form-control" id="other_property" value="{{ old('other_property', $userAdditionalDetail->other_property) }}"/>
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
    </div>
</div>

@endsection
