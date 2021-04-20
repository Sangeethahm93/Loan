<?php

namespace App\Http\Controllers;

use Gate;
use App\Models\UserAdditionalDetail;
use Illuminate\Http\Request;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\StoreAdditionalDetailsRequest;

class UsersAdditionalDetailsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        abort_if(Gate::denies('user_profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $userId = auth()->user()->id;
        $user = auth()->user();
        $userAdditionalDetail = UserAdditionalDetail::where('user_id', $userId)->first();
        return view('user.additional-detail.index', compact('user', 'userAdditionalDetail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        abort_if(Gate::denies('user_profile_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $user = auth()->user();
        return view('user.additional-detail.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdditionalDetailsRequest $request) {
        try {
            $id = $request->user_id;
            $userAdditionalDetail = UserAdditionalDetail::create($request->all());
            User::where('id', $id)->update(array('additional_details' => true));
        } catch(\Exception $e) {
            return redirect()->route('profile.additional-details.index')->with('error', 'Aditional deatils updated');
        }
        return redirect()->route('profile.additional-details.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        abort_if(Gate::denies('user_profile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $userAdditionalDetails = UserAdditionalDetail::find($id);
        $users = UserAdditionalDetail::find($id)->getAdditionalUser;
        $userAdditionalDetail = json_decode($userAdditionalDetails, true);
        $user = json_decode($users, true);
        return view('user.additional-detail.show', compact('userAdditionalDetail', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        abort_if(Gate::denies('user_profile_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $user = auth()->user();
        $userAdditionalDetail = UserAdditionalDetail::find($id);
        return view('user.additional-detail.edit', compact('userAdditionalDetail', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdditionalDetailsRequest $request, $id) {
        
    }

    public function destroy() {
        abort_if(Gate::denies('user_profile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    }
}
