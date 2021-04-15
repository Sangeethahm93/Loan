@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        Occupation Details
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("profile.occupation.store") }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="occupation">Occupation:</label>
                    </div>
                    <div class="col-md-9">
                        <select class="form-control" name="occupation" id="occupation" required>
                            <option value="">Select options</option>
                            @foreach($occupations as $id => $occupations)
                                <option value="{{ $occupations }}">{{ $occupations }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group" id="if_salaried" style="display:none;">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="salried_occupation_company">If Salaried:</label>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Type of Company:</label>
                                <select class="form-control" name="salried_occupation_company_type" id="salried_occupation_company_type">
                                    <option value="">Select options</option>
                                    <option value="Pvt ltd.">Pvt ltd.</option>
                                    <option value="Partnership">Partnership</option>
                                    <option value="Proprietor">Proprietor</option>
                                    <option value="Public Ltd.">Public Ltd.</option>
                                    <option value="Retailers">Retailers</option>
                                    <option value="Govt.">Govt.</option>
                                    <option value="MNC">MNC</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Type of Industry:</label>
                                <select class="form-control" name="salried_occupation_industry_type" id="salried_occupation_industry_type">
                                    <option value="">Select options</option>
                                    <option value="Automobiles">Automobiles</option>
                                    <option value="Agriculture Based">Agriculture Based</option>
                                    <option value="Banking">Banking</option>
                                    <option value="BPO">BPO</option>
                                    <option value="Telecom">Telecom</option>
                                    <option value="IT">IT</option>
                                    <option value="Retail">Retail</option>
                                    <option value="Real Estate">Real Estate</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group" id="if_self_employeed" style="display:none;">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="self_employeed">If Self Employeed:</label>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Type of Company:</label>
                                <select class="form-control" name="self_employeed_company_type" id="self_employeed_company_type">
                                    <option value="">Select options</option>
                                    <option value="Pvt ltd.">Pvt ltd.</option>
                                    <option value="Partnership">Partnership</option>
                                    <option value="Proprietor">Proprietor</option>
                                    <option value="Public Ltd.">Public Ltd.</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Nature of Business:</label>
                                <select class="form-control" name="self_employeed_business" id="self_employeed_business">
                                    <option value="">Select options</option>
                                    <option value="Manufacturer">Manufacturer</option>
                                    <option value="Agriculturist">Agriculturist</option>
                                    <option value="Service Provider">Service Provider</option>
                                    <option value="Trader/Distributor">Trader/Distributor</option>
                                    <option value="Retailer">Retailer</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group" id="if_self_employeed_professional" style="display:none;">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="self_employeed_professional">If Self Employeed Professional:</label>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-6">
                                <select class="form-control" name="self_employeed_professional" id="self_employeed_professional">
                                    <option value="">Select options</option>
                                    <option value="Doctor">Doctor</option>
                                    <option value="CA">CA</option>
                                    <option value="Consultant">Consultant</option>
                                    <option value="Architect">Architect</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group" id="other_occupation_detail" style="display:none;">
                <div class="row">
                    <div class="col-md-2 pr-0">
                    </div>
                    <div class="col-md-9">
                        <input type="text" placeholder="Enter other occupation" name="other_occupation" class="form-control" id="other_occupation" />
                        @error('other_occupation') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <p><b>Employer / Business Details</b></p>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="designation">Designation:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="designation" class="form-control" id="designation" />
                        @error('designation') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="current_job_experience">Current Job Experience:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="current_job_experience" class="form-control" id="current_job_experience" />
                        @error('current_job_experience') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>         
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="total_experience">Total Experience:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="total_experience" class="form-control" id="total_experience" />
                        @error('total_experience') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>         
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="company_name">Company Name:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="company_name" class="form-control" id="company_name" />
                        @error('company_name') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="address_line_one">Address Line One:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="address_line_one" class="form-control" id="address_line_one" />
                        @error('address_line_one') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>         
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="address_line_two">Address Line Two:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="address_line_two" class="form-control" id="address_line_two" />
                        @error('address_line_two') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>         
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="country">Country:</label>
                    </div>
                    <div class="col-md-9">
                        <select id="country" name=country class="form-control">
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
                        <label for="state">State:</label>
                    </div>
                    <div class="col-md-9">
                        <select name=state id="state" class="form-control">
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="city">City:</label>
                    </div>
                    <div class="col-md-9">
                        <select name=city id="city" class="form-control">
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="zipcode">Zipcode:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="zipcode" class="form-control" id="zipcode" />
                        @error('zipcode') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="tel_no">Tel.No:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="tel_no" class="form-control" id="tel_no" />
                        @error('tel_no') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <label for="company_email">Company Email:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="company_email" class="form-control" id="company_email" />
                        @error('company_email') <span class="error">{{ $message }}</span> @enderror
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
    $(document).ready(function () {
        $("#occupation").change(function () {
            var val = $(this).val();
            if (val == "Salaried") {
                $("#if_salaried").show();
                $("#if_self_employeed").hide();
                $("#if_self_employeed_professional").hide();
                $("#other_occupation_detail").hide();
            } else if (val == "Self Employeed") {
                $("#if_self_employeed").show();
                $("#if_salaried").hide();
                $("#if_self_employeed_professional").hide();
                $("#other_occupation_detail").hide();
            } else if (val == "Self Employeed Professional") {
                $("#if_self_employeed_professional").show();
                $("#if_salaried").hide();
                $("#if_self_employeed").hide();
                $("#other_occupation_detail").hide();
            } else if (val == "Other") {
                $("#if_salaried").hide();
                $("#if_self_employeed").hide();
                $("#if_self_employeed_professional").hide();
                $("#other_occupation_detail").show();
            } else {
                $("#if_salaried").hide();
                $("#if_self_employeed").hide();
                $("#if_self_employeed_professional").hide();
                $("#other_occupation_detail").hide();
            }
        });
    });

    $('#country').change(function() {
        var countryID = $(this).val();  
        if(countryID) {
            $.ajax({
                type:"GET",
                url:"{{url('profile/get-state-list')}}?country_id="+countryID,
                success:function(res) {        
                    if(res) {
                        $("#state").empty();
                        $("#state").append('<option>Select</option>');
                        $.each(res,function(key,value){
                            $("#state").append('<option value="'+key+'">'+value+'</option>');
                        });
                    } else {
                        $("#state").empty();
                    }
                }
            });
        } else {
            $("#state").empty();
            $("#city").empty();
        }   
    });

    $('#state').on('change',function() {
        var stateID = $(this).val();  
        if(stateID) {
            $.ajax({
                type:"GET",
                url:"{{url('profile/get-city-list')}}?state_id="+stateID,
                success:function(res) {        
                    if(res) {
                        $("#city").empty();
                        $("#city").append('<option>Select</option>');
                        $.each(res,function(key,value){
                            $("#city").append('<option value="'+key+'">'+value+'</option>');
                        });
                    } else {
                        $("#city").empty();
                    }
                }
            });
        } else {
            $("#city").empty();
        }
    });
</script>
@endsection