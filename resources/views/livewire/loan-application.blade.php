<div>
    @if(!empty($successMsg))
    <div class="alert alert-success">
        {{ $successMsg }}
    </div>
    @endif
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="multi-wizard-step">
                <a href="#step-1" type="button"
                    class="btn {{ $currentStep != 1 ? 'btn-default' : 'btn-primary' }}">Personal Details</a>
            </div>
            <div class="multi-wizard-step">
                <a href="#step-2" type="button"
                    class="btn {{ $currentStep != 2 ? 'btn-default' : 'btn-primary' }}">Address</a>
            </div>
            <div class="multi-wizard-step">
                <a href="#step-3" type="button"
                    class="btn {{ $currentStep != 3 ? 'btn-default' : 'btn-primary' }}"
                    disabled="disabled">Occupation Details</a>
            </div>
            <div class="multi-wizard-step">
                <a href="#step-4" type="button"
                    class="btn {{ $currentStep != 4 ? 'btn-default' : 'btn-primary' }}"
                    disabled="disabled">Income and Banking Details</a>
            </div>
            <div class="multi-wizard-step">
                <a href="#step-5" type="button"
                    class="btn {{ $currentStep != 5 ? 'btn-default' : 'btn-primary' }}"
                    disabled="disabled">Loan Details</a>
            </div>
            <div class="multi-wizard-step">
                <a href="#step-6" type="button"
                    class="btn {{ $currentStep != 6 ? 'btn-default' : 'btn-primary' }}"
                    disabled="disabled">Final View</a>
            </div>
        </div>
    </div>

    <div class="card p-4 mt-4">
        <div class="row setup-content {{ $currentStep != 1 ? 'display-none' : '' }}" id="step-1">
            <div class="col-md-12">
                <h4 class="mb-4">Personal Details</h4>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2 pr-0">
                            <label for="applicantName">Applicant Name:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" wire:model="applicantName" class="form-control" id="applicantName">
                            @error('applicantName') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2 pr-0">
                            <label for="fatherOrHusbandName">Father/Husband Name:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" wire:model="fatherOrHusbandName" class="form-control" id="fatherOrHusbandName" />
                            @error('fatherOrHusbandName') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2 pr-0">
                            <label for="dateOfBirth">Date of Birth:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="date" wire:model="dateOfBirth" class="form-control" id="dateOfBirth" />
                            @error('dateOfBirth') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>         
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2 pr-0">
                            <label for="gender" class="control-label">Gender:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="radio" id="male" value="male" wire:model="gender">
                            <label for="male">Male</label>
                            <input type="radio" id="female" value="female" wire:model="gender">
                            <label for="female">Female</label>
                            <input type="radio" id="other" value="other" wire:model="gender">
                            <label for="other">Other</label>
                            @error('gender') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>         
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2 pr-0">
                            <label for="marriedStatus" class="control-label">Married Status:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="radio" id="single" value="single" wire:model="marriedStatus">
                            <label for="single">Single</label>
                            <input type="radio" id="married" value="married" wire:model="marriedStatus">
                            <label for="married">Married</label>
                            @error('marriedStatus') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2 pr-0">
                            <label for="religion">Religion:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" wire:model="religion" class="form-control" id="religion" />
                            @error('religion') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2 pr-0">
                            <label for="mobileNo">Mobile Number:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" wire:model="mobileNo" class="form-control" id="mobileNo">
                            @error('mobileNo') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2 pr-0">
                            <label for="panNo">Pancard Number:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" wire:model="panNo" class="form-control" id="panNo" />
                            @error('panNo') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2 pr-0">
                            <label for="adharNo">Adhar Number:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" wire:model="adharNo" class="form-control" id="adharNo" />
                            @error('adharNo') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary nextBtn btn-lg pull-right" wire:click="firstStepSubmit"
                    type="button">Next</button>
            </div>
        </div>
    </div>
    
    <div class="row setup-content {{ $currentStep != 2 ? 'display-none' : '' }}" id="step-2">
        <div class="col-md-12">
            <h3> Step 2</h3>
            <div class="form-group">
                <label for="description">Team Status</label><br />
                <label class="radio-inline"><input type="radio" wire:model="status" value="1"
                        {{{ $status == '1' ? "checked" : "" }}}> Active</label>
                <label class="radio-inline"><input type="radio" wire:model="status" value="0"
                        {{{ $status == '0' ? "checked" : "" }}}> DeActive</label>
                @error('status') <span class="error">{{ $message }}</span> @enderror
            </div>
            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button"
                wire:click="secondStepSubmit">Next</button>
            <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(1)">Back</button>
        </div>
    </div>
    <div class="row setup-content {{ $currentStep != 3 ? 'display-none' : '' }}" id="step-3">
        <div class="col-md-12">
            <h3> Step 3</h3>
            <table class="table">
                <tr>
                    <td>Team Name:</td>
                    <td><strong>{{$name}}</strong></td>
                </tr>
                <tr>
                    <td>Team Price:</td>
                    <td><strong>{{$price}}</strong></td>
                </tr>
                <tr>
                    <td>Team status:</td>
                    <td><strong>{{$status ? 'Active' : 'DeActive'}}</strong></td>
                </tr>
                <tr>
                    <td>Team Detail:</td>
                    <td><strong>{{$detail}}</strong></td>
                </tr>
            </table>
            <button class="btn btn-success btn-lg pull-right" wire:click="submitForm" type="button">Finish!</button>
            <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(2)">Back</button>
        </div>
    </div>
</div>

@section('scripts')
@parent
<script>
    $("#firstStepSubmit").click(function(){
        alert();
    });
</script>
@endsection