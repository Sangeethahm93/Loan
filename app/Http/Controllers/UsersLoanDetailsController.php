<?php

namespace App\Http\Controllers;

use Gate;
use App\Models\UserLoanDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\StoreIncomeBankDetailsRequest;
use Validator;

class UsersLoanDetailsController extends Controller
{
    public function index() 
    {
        abort_if(Gate::denies('user_profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userId = auth()->user()->id;
        $user = auth()->user();
        $userLoanDetails = UserLoanDetail::all()->where('user_id', $userId);
        $userLoanDetail = json_decode($userLoanDetails, true);
        return view('user.loan-detail.index', compact('user', 'userLoanDetails'));
    }

    public function create() 
    {
        abort_if(Gate::denies('user_profile_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $user = auth()->user();
        return view('user.loan-detail.create', compact('user'));
    }

    public function store(Request $request) {
        if($request->ajax()) {
            $rules = array(
                'existing_loan_bank.*'  => 'required',
                'existing_loan_type.*'  => 'required',
                'existing_loan_amount.*'  => 'required',
                'existing_loan_emi.*'  => 'required',
                'existing_loan_tenure.*'  => 'required',
                'existing_loan_start_date.*'  => 'required',
                'existing_loan_account_number.*'  => 'required',
            );

            $error = Validator::make($request->all(), $rules);
            if($error->fails()) {
                return response()->json([
                    'error'  => $error->errors()->all()
                ]);
            }

            $user_id = $request->user_id;
            $existing_loan_bank = $request->existing_loan_bank;
            $existing_loan_type = $request->existing_loan_type;
            $existing_loan_amount = $request->existing_loan_amount;
            $existing_loan_emi = $request->existing_loan_emi;
            $existing_loan_tenure = $request->existing_loan_tenure;
            $existing_loan_start_date = $request->existing_loan_start_date;
            $existing_loan_account_number = $request->existing_loan_account_number;

            for($count = 0; $count < count($existing_loan_bank); $count++) {
                $data = array(
                    'user_id' => $user_id,
                    'existing_loan_bank' => $existing_loan_bank[$count],
                    'existing_loan_type'  => $existing_loan_type[$count],
                    'existing_loan_amount' => $existing_loan_amount[$count],
                    'existing_loan_emi'  => $existing_loan_emi[$count],
                    'existing_loan_tenure' => $existing_loan_tenure[$count],
                    'existing_loan_start_date'  => $existing_loan_start_date[$count],
                    'existing_loan_account_number'  => $existing_loan_account_number[$count],
                 );
                $insert_data[] = $data; 
            }

            UserLoanDetail::insert($insert_data);
            User::where('id', $user_id)->update(array('loan_details' => true));
            return response()->json([
                'success'  => 'Data Added successfully.'
            ]);
        }
    }

    public function show($id) {
        abort_if(Gate::denies('user_profile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    }

    public function edit() {
        
    }

    public function update() {
        
    }

    public function delete() {
        
    }
}
