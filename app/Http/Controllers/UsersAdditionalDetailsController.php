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
    public function index() {
        abort_if(Gate::denies('user_profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userId = auth()->user()->id;
        $user = auth()->user();
        $userAdditionalDetails = UserAdditionalDetail::all()->where('user_id', $userId);
        $userAdditionalDetail = json_decode($userAdditionalDetails, true);
        return view('user.additional-detail.index', compact('user', 'userAdditionalDetail'));
    }

    public function create() {
        abort_if(Gate::denies('user_profile_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = auth()->user();

        return view('user.additional-detail.create', compact('user'));
    }

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

    public function show($id) {
        abort_if(Gate::denies('user_profile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userAdditionalDetails = UserAdditionalDetail::find($id);
        $users = UserAdditionalDetail::find($id)->getAdditionalUser;
        $userAdditionalDetail = json_decode($userAdditionalDetails, true);
        $user = json_decode($users, true);
        return view('user.additional-detail.show', compact(
            'userAdditionalDetail', 'user'
        ));
    }

    public function edit() {
        abort_if(Gate::denies('user_profile_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    }

    public function update() {

    }

    public function destroy() {
        abort_if(Gate::denies('user_profile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    }
}
