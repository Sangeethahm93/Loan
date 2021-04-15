@extends('layouts.admin')

@section('content')
@section('content')
<div class="card">
    <div class="card-header">
        Loan Details
    </div>

    <div class="card-body">
        <span id="result"></span>
        <form method="POST" id="existing_loan_form">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <div class="existing_bank_loans">
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

            var count = 1;

            dynamic_field(count);

            function dynamic_field(number) {
                html = '<div class="new_existing_loan_block">';
                html += '<div class="form-group"><div class="row"><div class="col-md-2 pr-0"><label for="existing_loan_bank">Bank / Co. Name:</label></div><div class="col-md-9"><input type="text" name="existing_loan_bank[]" class="form-control" id="existing_loan_bank" />@error("existing_loan_bank") <span class="error">{{ $message }}</span> @enderror</div></div></div>';
                html += '<div class="form-group"><div class="row"><div class="col-md-2 pr-0"><label for="existing_loan_type">Loan Type:</label></div><div class="col-md-9"><input type="text" name="existing_loan_type[]" class="form-control" id="existing_loan_type" />@error("existing_loan_type") <span class="error">{{ $message }}</span> @enderror</div></div></div>';
                html += '<div class="form-group"><div class="row"><div class="col-md-2 pr-0"><label for="existing_loan_amount">Amount:</label></div><div class="col-md-9"><input type="text" name="existing_loan_amount[]" class="form-control" id="existing_loan_amount" />@error("existing_loan_amount") <span class="error">{{ $message }}</span> @enderror</div></div></div>';
                html += '<div class="form-group"><div class="row"><div class="col-md-2 pr-0"><label for="existing_loan_emi">EMI:</label></div><div class="col-md-9"><input type="text" name="existing_loan_emi[]" class="form-control" id="existing_loan_emi" />@error("existing_loan_emi") <span class="error">{{ $message }}</span> @enderror</div></div></div>';
                html += '<div class="form-group"><div class="row"><div class="col-md-2 pr-0"><label for="existing_loan_tenure">Tenure:</label></div><div class="col-md-9"><input type="text" name="existing_loan_tenure[]" class="form-control" id="existing_loan_tenure" />@error("existing_loan_tenure") <span class="error">{{ $message }}</span> @enderror</div></div></div>';
                html += '<div class="form-group"><div class="row"><div class="col-md-2 pr-0"><label for="existing_loan_start_date">Start Date:</label></div><div class="col-md-9"><input type="date" name="existing_loan_start_date[]" class="form-control" id="existing_loan_start_date" />@error("existing_loan_start_date") <span class="error">{{ $message }}</span> @enderror</div></div></div>';
                html += '<div class="form-group"><div class="row"><div class="col-md-2 pr-0"><label for="existing_loan_account_number">Loan Account Number:</label></div><div class="col-md-9"><input type="text" name="existing_loan_account_number[]" class="form-control" id="existing_loan_account_number" />@error("existing_loan_account_number") <span class="error">{{ $message }}</span> @enderror</div></div></div>';
                if(number > 1)
                {
                    html += '<button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button>';
                    $('.existing_bank_loans').append(html);
                }
                else
                {   
                    html += '<button type="button" name="add" id="add" class="btn btn-success">Add More</button>';
                    $('.existing_bank_loans').html(html);
                }
            }

            $(document).on('click', '#add', function(){
                count++;
                dynamic_field(count);
            });

            $(document).on('click', '.remove', function(){
                count--;
                $(this).closest(".new_existing_loan_block").remove();
            });

            $('#existing_loan_form').on('submit', function(event) {
                alert();
                event.preventDefault();
                $.ajax({
                    url:'{{ route("profile.loan-details.store") }}',
                    method:'post',
                    data:$(this).serialize(),
                    dataType:'json',
                    beforeSend:function(){
                        $('#save').attr('disabled','disabled');
                    },
                    success:function(data)
                    {
                        if(data.error)
                        {
                            var error_html = '';
                            for(var count = 0; count < data.error.length; count++)
                            {
                                error_html += '<p>'+data.error[count]+'</p>';
                            }
                            $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
                        }
                        else
                        {
                            dynamic_field(1);
                            $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
                        }
                        $('#save').attr('disabled', false);
                    },
                    error:function(data) {
                        console.log(data);
                    }
                });
            });
        });
    </script>
@endsection

