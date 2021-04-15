<?php

namespace App\Http\Controllers;

use Gate;
use App\Models\UserIncomeBankDetail;
use Illuminate\Http\Request;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\StoreIncomeBankDetailsRequest;

class UsersIncomeBankController extends Controller
{
    public function index() 
    {
        abort_if(Gate::denies('user_profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userId = auth()->user()->id;
        $user = auth()->user();
        $userIncomeBankDetails = UserIncomeBankDetail::all()->where('user_id', $userId);
        $userIncomeBankDetail = json_decode($userIncomeBankDetails, true);
        return view('user.income-bank.index', compact('user', 'userIncomeBankDetail'));
    }

    public function create() {

        abort_if(Gate::denies('user_profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = auth()->user();

        return view('user.income-bank.create', compact('user'));
    }

    /**
     * Storing the user occupation details to database
     */
    public function store(StoreIncomeBankDetailsRequest $request) 
    {
        try {
            $id = $request->user_id;
            $incomeBankDetails = UserIncomeBankDetail::create($request->all());
            User::where('id', $id)->update(array('bank_income_details' => true));
        } catch(\Exception $e) {
            return redirect()->route('profile.income-bank.index')->with('error', 'Profile already created');
        }
        return redirect()->route('profile.income-bank.index');
    }

    public function show($id) {
        abort_if(Gate::denies('user_profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userIncomeBankDetails = UserIncomeBankDetail::find($id);
        $users = UserIncomeBankDetail::find($id)->getIncomeUser;
        $userIncomeBankDetail = json_decode($userIncomeBankDetails, true);
        $user = json_decode($users, true);
        return view('user.income-bank.show', compact(
            'userIncomeBankDetail', 'user'
        ));
    }

    public function edit() {

    }

    public function update() {
        
    }

    public function destroy() {
        
    }
}
