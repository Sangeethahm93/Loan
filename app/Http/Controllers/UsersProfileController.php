<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsersPersonalDetailsRequest;
use Gate;
use DB;
use App\Models\EducationType;
use App\Models\Country;
use App\Models\UserPersonalDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsersProfileController extends Controller
{
    public function getStateList(Request $request)
    {
        $states = DB::table("states")
        ->where("country_id", $request->country_id)
        ->pluck("name", "id");
        return response()->json($states);
    }

    public function getCityList(Request $request)
    {
        $cities = DB::table("cities")
        ->where("state_id", $request->state_id)
        ->pluck("name", "id");
        return response()->json($cities);
    }

    public function getStates(Request $request)
    {
        $states = DB::table("states")
        ->where("id", $request->id)
        ->pluck("name", "id");
        return response()->json($states);
    }

    public function getCities(Request $request)
    {
        $states = DB::table("cities")
        ->where("id", $request->id)
        ->pluck("name", "id");
        return response()->json($states);
    }

    public function index() 
    {
        abort_if(Gate::denies('user_profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $userId = auth()->user()->id;
        $user = auth()->user();
        $userPersonalDetails = UserPersonalDetail::all()->where('user_id', $userId);
        $userPersonalDetail = json_decode($userPersonalDetails, true);
        return view('user.personal.index', compact('user', 'userPersonalDetail'));
    }

    public function create() 
    {
        abort_if(Gate::denies('user_profile_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $educationTypes = EducationType::all()->pluck('name', 'id');
        $countries = Country::all()->pluck('name', 'id');
        $user = auth()->user();

        return view('user.personal.create', compact('educationTypes', 'user', 'countries'));
    }

    public function store(StoreUsersPersonalDetailsRequest $request) 
    {
        try {
            $id = $request->user_id;
            $usersPersonalDetails = UserPersonalDetail::create($request->all());
            User::where('id', $id)->update(array('personal_details' => true));
        } catch(\Exception $e) {
            return redirect()->route('profile.personal.index')->with('error', 'Profile already created');
        }
        
        return redirect()->route('profile.personal.index');
    }

    public function edit() {
        
        abort_if(Gate::denies('user_profile_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userId = auth()->user()->id;
        $user = auth()->user();
        $educationTypes = EducationType::all()->pluck('name', 'id');
        $countries = Country::all()->pluck('name', 'id');
        $userPersonalDetail = UserPersonalDetail::all()->where('user_id', $userId);

        return view('user.personal.edit', compact('educationTypes', 'user', 'countries', 'userPersonalDetail'));
    }

    public function update() {

    }

    public function show($id) {

        abort_if(Gate::denies('user_profile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userPersonalDetails = UserPersonalDetail::find($id);
        $users = UserPersonalDetail::find($id)->user;
        $preCountries = UserPersonalDetail::find($id)->preCountry;
        $perCountries = UserPersonalDetail::find($id)->perCountry;
        $preStates = UserPersonalDetail::find($id)->preState;
        $perStates = UserPersonalDetail::find($id)->perState;
        $preCities = UserPersonalDetail::find($id)->preCity;
        $preCities = UserPersonalDetail::find($id)->perCity;

        $userPersonalDetail = json_decode($userPersonalDetails, true);
        $user =json_decode($users, true);
        $preCountry = json_decode($preCountries, true);
        $perCountry = json_decode($perCountries, true);
        $preState = json_decode($preStates, true);
        $perState = json_decode($perStates, true);
        $preCity = json_decode($preCities, true);
        $perCity = json_decode($preCities, true);
        
        //dd($user);
        return view('user.personal.show', compact(
            'userPersonalDetail', 'user', 'preCountry', 'perCountry', 'preState', 'perState', 'preCity', 'perCity'
        ));
    }

    public function destroy() {

    }
}
