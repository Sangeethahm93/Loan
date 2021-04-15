<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Gate;
use DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\UserSalaryDocument;
use App\Models\UserPersonalDetail;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id');

        return view('admin.users.create', compact('roles'));         
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id');

        $user->load('roles');

        return view('admin.users.edit', compact('roles', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles');

        $userPersonalDetails = DB::table('users_personal_details')
                        ->leftJoin('cities as prc', 'prc.id', '=', 'users_personal_details.pre_city')
                        ->leftJoin('states as prs', 'prs.id', '=', 'users_personal_details.pre_state')
                        ->leftJoin('countries as prco', 'prco.id', '=', 'users_personal_details.pre_country')
                        ->leftJoin('cities as pec', 'pec.id', '=', 'users_personal_details.per_city')
                        ->leftJoin('states as pes', 'pes.id', '=', 'users_personal_details.per_state')
                        ->leftJoin('countries as peco', 'peco.id', '=', 'users_personal_details.per_country')
                        ->where('users_personal_details.user_id', $user->id)
                        ->select('users_personal_details.*', 'prc.name as pre_city_name', 'prs.name as pre_state_name', 'prco.name as pre_country_name', 'pec.name as per_city_name', 'pes.name as per_state_name', 'peco.name as per_country_name')
                        ->get();

        $userOccupationDetails = DB::table('users_occupation_details')
                        ->leftJoin('cities as c', 'c.id', '=', 'users_occupation_details.city')
                        ->leftJoin('states as s', 's.id', '=', 'users_occupation_details.state')
                        ->leftJoin('countries as co', 'co.id', '=', 'users_occupation_details.country')
                        ->where('users_occupation_details.user_id', $user->id)
                        ->select('users_occupation_details.*', 'c.name as city', 's.name as state', 'co.name as country')
                        ->get();

        $userLoanDetails = DB::table('users_loan_details')
                        ->where('users_loan_details.user_id', $user->id)
                        ->get();

        $userKYCDocuments = DB::table('users_kyc_documents')
                        ->where('users_kyc_documents.user_id', $user->id)
                        ->get();

        $userSalaryDocuments = DB::table('users_salary_documents')
                        ->where('users_salary_documents.user_id', $user->id)
                        ->get();

        $userIncomeBankDetails = DB::table('users_income_bank_details')
                        ->where('users_income_bank_details.user_id', $user->id)
                        ->get();

        $userAdditionalDetails = DB::table('users_additional_details')
                        ->where('users_additional_details.user_id', $user->id)
                        ->get();

        return view('admin.users.show', compact('user', 'userPersonalDetails', 'userOccupationDetails', 'userLoanDetails', 'userKYCDocuments', 'userSalaryDocuments', 'userIncomeBankDetails', 'userAdditionalDetails'));
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return back();
    }

}