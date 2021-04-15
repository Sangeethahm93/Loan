<?php

namespace App\Http\Controllers;

use Gate;
use App\Models\User;
use App\Models\Country;
use App\Models\Occupation;
use App\Models\UserOccupationDetail;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\StoreUsersOccupationDetailsRequest;

class UsersOccupationController extends Controller
{
    /**
     * Adding the user occupation details
     */
    public function index() 
    {
        abort_if(Gate::denies('user_profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userId = auth()->user()->id;
        $user = auth()->user();
        $userOccupationDetails = UserOccupationDetail::all()->where('user_id', $userId);
        $userOccupationDetail = json_decode($userOccupationDetails, true);
        return view('user.occupation.index', compact('user', 'userOccupationDetail'));
    }

    public function create() 
    {
        abort_if(Gate::denies('user_profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $occupations = Occupation::all()->pluck('name', 'id');
        $user = auth()->user();
        $countries = Country::all()->pluck('name', 'id');

        return view('user.occupation.create', compact('occupations', 'user', 'countries'));
    }

    /**
     * Storing the user occupation details to database
     */
    public function store(StoreUsersOccupationDetailsRequest $request) 
    {
        try {
            $id = $request->user_id;
            $usersOccupationDetails = UserOccupationDetail::create($request->all());
            User::where('id', $id)->update(array('occupation' => true));
        } catch(\Exception $e) {
            return redirect()->route('profile.occupation.index')->with('error', 'Profile already created');
        }
        return redirect()->route('profile.occupation.index');
    }

    public function edit() {

    }

    public function update() {
        
    }

    public function show($id) {
        abort_if(Gate::denies('user_profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usersOccupationDetails = UserOccupationDetail::find($id);
        $users = UserOccupationDetail::find($id)->user;
        $countries = UserOccupationDetail::find($id)->getCountry;
        $states = UserOccupationDetail::find($id)->getState;
        $cities = UserOccupationDetail::find($id)->getCity;

        $usersOccupationDetail = json_decode($usersOccupationDetails, true);
        $user = json_decode($users, true);
        $country = json_decode($countries, true);
        $state = json_decode($states, true);
        $city = json_decode($cities, true);

        return view('user.occupation.show', compact(
            'usersOccupationDetail', 'user', 'country', 'state', 'city'
        ));
    }

    public function destroy() {
        
    }
}
