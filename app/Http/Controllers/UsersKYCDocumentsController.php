<?php

namespace App\Http\Controllers;

use Gate;
use App\Models\User;
use App\Models\UserKYCDocument;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\StoreUserKycDocumentsRequest;
use Storage;
use League\Flysystem\Filesystem;
use Illuminate\Support\Facades\Cache;
use Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter;
use Validator;
use Illuminate\Support\Facades\File;

class UsersKYCDocumentsController extends Controller
{
    public function index() 
    {
        abort_if(Gate::denies('user_profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = auth()->user();
        $userId = auth()->user()->id;
        $userKYCDocuments = UserKYCDocument::all()->where('user_id', $userId);
        $userKYCDocument = json_decode($userKYCDocuments, true);
        return view('user.kyc-document.index', compact('user', 'userKYCDocuments'));
    }

    public function create() {
        abort_if(Gate::denies('user_profile_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = auth()->user();
        return view('user.kyc-document.create', compact('user'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserKycDocumentsRequest $request) 
    {
        $files = $request->file('kyc_file');

        $input = $request->all();
        $kycDocumentTypes = $request->input('kyc_document_type');
        $kycDocuments = $request->file('kyc_file');

        try {
            for($i=0; $i< count($input['kyc_document_type']); $i++) {
                if (isset($kycDocuments[$i]) && is_file($kycDocuments[$i])) {
                    $extension = $kycDocuments[$i]->getClientOriginalExtension();
                    Storage::disk('google')->put($kycDocuments[$i]->getClientOriginalName().'.'.$extension, File::get($kycDocuments[$i]));
                    $url = Storage::disk('google')->url($kycDocuments[$i]->getClientOriginalName().'.'.$extension, File::get($kycDocuments[$i]));
                    $userKYCDocument = new UserKYCDocument();
                    $userKYCDocument->user_id = $request->user_id;
                    $userKYCDocument->kyc_document_type = $kycDocumentTypes[$i];
                    $userKYCDocument->kyc_file = $url;
                    $userKYCDocument->status = 'pending';
                    $userKYCDocument->save();
                }
            }
            User::where('id', $request->user_id)->update(array('kyc_documents' => true));
        } catch(\Exception $e) {
            return redirect()->route('profile.kyc-document.create')->with('error', 'Error while uploading');
        }
        return redirect()->route('profile.kyc-document.index')->with('success', 'Files uploaded successfully.');
    }
}
