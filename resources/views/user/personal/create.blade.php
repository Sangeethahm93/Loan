@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        Personal 
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('profile.personal.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="applicant_name">Applicant Name:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="applicant_name" class="form-control" id="applicant_name" value="{{ $user->name }}">
                        @error('applicant_name') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="father_or_husband_name">Father/Husband Name:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="father_or_husband_name" class="form-control" id="father_or_husband_name" />
                        @error('father_or_husband_name') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="date_of_birth">Date of Birth:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="date" name="date_of_birth" class="form-control" id="date_of_birth" />
                        @error('date_of_birth') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>         
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="gender" class="control-label">Gender:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="radio" id="male" value="male" name="gender">
                        <label for="male">Male</label>
                        <input type="radio" id="female" value="female" name="gender">
                        <label for="female">Female</label>
                        <input type="radio" id="other" value="other" name="gender">
                        <label for="other">Other</label>
                        @error('gender') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>         
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="married_status" class="control-label">Married Status:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="radio" id="single" value="single" name="married_status">
                        <label for="single">Single</label>
                        <input type="radio" id="married" value="married" name="married_status">
                        <label for="married">Married</label>
                        @error('married_status') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="religion">Religion:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="religion" class="form-control" id="religion" />
                        @error('religion') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="mobile_no">Mobile Number:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="mobile_no" class="form-control" id="mobile_no">
                        @error('mobile_no') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="pan_no">Pancard Number:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="pan_no" class="form-control" id="pan_no" />
                        @error('pan_no') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="adhar_no">Adhar Number:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="adhar_no" class="form-control" id="adhar_no" />
                        @error('adhar_no') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="education_type">Education Type:</label>
                    </div>
                    <div class="col-md-9">
                        <select class="form-control" name="education_type" id="education_type" required>
                            @foreach($educationTypes as $id => $educationTypes)
                                <option value="{{ $educationTypes }}">{{ $educationTypes }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <p><b>Present Address</b></p>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="pre_address_line_one">Address Line One:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="pre_address_line_one" class="form-control" id="pre_address_line_one" />
                        @error('pre_address_line_one') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>         
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="pre_address_line_two">Address Line Two:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="pre_address_line_two" class="form-control" id="pre_address_line_two" />
                        @error('pre_address_line_two') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>         
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="pre_country">Country:</label>
                    </div>
                    <div class="col-md-9">
                        <select id="pre_country" name=pre_country class="form-control">
                            <option value="" selected disabled>Select</option>
                            @foreach($countries as $key => $country)
                            <option value="{{$key}}"> {{$country}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="pre_state">State:</label>
                    </div>
                    <div class="col-md-9">
                        {{-- <input type="text" name="pre_state" class="form-control" id="pre_state" />
                        @error('pre_state') <span class="error">{{ $message }}</span> @enderror --}}
                        <select name=pre_state id="pre_state" class="form-control">
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="pre_city">City:</label>
                    </div>
                    <div class="col-md-9">
                        {{-- <input type="text" name="pre_city" class="form-control" id="pre_city" />
                        @error('pre_city') <span class="error">{{ $message }}</span> @enderror --}}
                        <select name=pre_city id="pre_city" class="form-control">
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="pre_zipcode">Zipcode:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="pre_zipcode" class="form-control" id="pre_zipcode" />
                        @error('pre_zipcode') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <p><b>Is Present Address is same as Permanent Address? </b> <input type="checkbox" id="copypermaddress" name="copypermaddress"> Yes </p>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="per_address_line_one">Address Line One:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="per_address_line_one" class="form-control" id="per_address_line_one" />
                        @error('per_address_line_one') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>         
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="per_address_line_two">Address Line Two:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="per_address_line_two" class="form-control" id="per_address_line_two" />
                        @error('per_address_line_two') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>         
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="per_country">Country:</label>
                    </div>
                    <div class="col-md-9">
                        {{-- <input type="text" name="per_country" class="form-control" id="per_country" />
                        @error('per_country') <span class="error">{{ $message }}</span> @enderror --}}
                        <select id="per_country" name=per_country class="form-control">
                            <option value="" selected disabled>Select</option>
                            @foreach($countries as $key => $country)
                                <option value="{{$key}}"> {{$country}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="per_state">State:</label>
                    </div>
                    <div class="col-md-9">
                        {{-- <input type="text" name="per_state" class="form-control" id="per_state" />
                        @error('per_state') <span class="error">{{ $message }}</span> @enderror --}}
                        <select name=per_state id="per_state" class="form-control">
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="per_city">City:</label>
                    </div>
                    <div class="col-md-9">
                        {{-- <input type="text" name="per_city" class="form-control" id="per_city" />
                        @error('per_city') <span class="error">{{ $message }}</span> @enderror --}}
                        <select name=per_city id="per_city" class="form-control">
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="per_zipcode">Zipcode:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="per_zipcode" class="form-control" id="per_zipcode" />
                        @error('per_zipcode') <span class="error">{{ $message }}</span> @enderror
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
<script>
    $(document).ready(function(){
        $("#copypermaddress").on("click", function(){
            if (this.checked) {
                $("#per_zipcode").val($("#pre_zipcode").val());
                $("#per_country").val($("#pre_country").val());
                $("#per_landmark").val($("#pre_landmark").val());
                $("#per_address_line_two").val($("#pre_address_line_two").val());
                $("#per_address_line_one").val($("#pre_address_line_one").val());
                var stateIdOnSelect = $('#pre_state').val();
                var cityIdOnSelect = $("#pre_city").val();
                if(stateIdOnSelect) {
                    $.ajax({
                        type:"GET",
                        url:"{{url('profile/get-states')}}?id="+stateIdOnSelect,
                        success:function(res) {
                            if(res) {
                                $.each(res,function(key,value){
                                    $("#per_state").append('<option value="'+key+'">'+value+'</option>');
                                });
                            } else {
                                $("#per_state").empty();
                            }
                        }
                    });
                } else {
                    $("#per_state").empty();
                }

                if(cityIdOnSelect) {
                    $.ajax({
                        type:"GET",
                        url:"{{url('profile/get-cities')}}?id="+cityIdOnSelect,
                        success:function(res) {
                            if(res) {
                                $.each(res,function(key,value){
                                    $("#per_city").append('<option value="'+key+'">'+value+'</option>');
                                });
                            } else {
                                $("#per_city").empty();
                            }
                        }
                    });
                } else {
                    $("#per_city").empty();
                }

            } else {
                $("#per_zipcode").val('');
                $("#per_city").empty();
                $("#per_state").empty();
                $("#per_country").val('');
                $("#per_landmark").val('');
                $("#per_address_line_two").val('');
                $("#per_address_line_one").val('');
            }
        });
    });
</script>
<script type=text/javascript>
    $('#pre_country').change(function() {
        var countryID = $(this).val();  
        if(countryID) {
            $.ajax({
                type:"GET",
                url:"{{url('profile/get-state-list')}}?country_id="+countryID,
                success:function(res) {        
                    if(res) {
                        $("#pre_state").empty();
                        $("#pre_state").append('<option>Select</option>');
                        $.each(res,function(key,value){
                            $("#pre_state").append('<option value="'+key+'">'+value+'</option>');
                        });
                    } else {
                        $("#pre_state").empty();
                    }
                }
            });
        } else {
            $("#pre_state").empty();
            $("#pre_city").empty();
        }   
    });

    $('#pre_state').on('change',function() {
        var stateID = $(this).val();  
        if(stateID) {
            $.ajax({
                type:"GET",
                url:"{{url('profile/get-city-list')}}?state_id="+stateID,
                success:function(res) {        
                    if(res) {
                        $("#pre_city").empty();
                        $.each(res,function(key,value){
                            $("#pre_city").append('<option value="'+key+'">'+value+'</option>');
                        });
                    } else {
                        $("#pre_city").empty();
                    }
                }
            });
        } else {
            $("#pre_city").empty();
        }
    });

    $('#per_country').change(function() {
        var countryID = $(this).val();  
        if(countryID) {
            $.ajax({
                type:"GET",
                url:"{{url('profile/get-state-list')}}?country_id="+countryID,
                success:function(res) {        
                    if(res) {
                        $("#per_state").empty();
                        $("#per_state").append('<option>Select</option>');
                        $.each(res,function(key,value){
                            $("#per_state").append('<option value="'+key+'">'+value+'</option>');
                        });
                    } else {
                        $("#per_state").empty();
                    }
                }
            });
        } else {
            $("#per_state").empty();
            $("#per_city").empty();
        }   
    });

    $('#per_state').on('change',function() {
        var stateID = $(this).val();  
        if(stateID) {
            $.ajax({
                type:"GET",
                url:"{{url('profile/get-city-list')}}?state_id="+stateID,
                success:function(res) {        
                    if(res) {
                        $("#per_city").empty();
                        $.each(res,function(key,value){
                            $("#per_city").append('<option value="'+key+'">'+value+'</option>');
                        });
                    } else {
                        $("#per_city").empty();
                    }
                }
            });
        } else {
            $("#per_city").empty();
        }
    });
  </script>
@endsection