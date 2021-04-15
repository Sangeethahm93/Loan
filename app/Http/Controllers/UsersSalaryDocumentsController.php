<?php

namespace App\Http\Controllers;

use Gate;
use App\Models\User;
use App\Models\UserSalaryDocument;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\StoreUserSalaryDocumentsRequest;
use Storage;
use League\Flysystem\Filesystem;
use Illuminate\Support\Facades\Cache;
use Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter;
use Validator;
use Illuminate\Support\Facades\File;

class UsersSalaryDocumentsController extends Controller
{
    public function index() 
    {
        abort_if(Gate::denies('user_profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = auth()->user();
        $userId = auth()->user()->id;
        $userSalaryDocuments = UserSalaryDocument::all()->where('user_id', $userId);
        $userSalaryDocument = json_decode($userSalaryDocuments, true);
        return view('user.salary-document.index', compact('user', 'userSalaryDocuments'));
    }

    public function create() {
        abort_if(Gate::denies('user_profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $user = auth()->user();
        return view('user.salary-document.create', compact('user'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserSalaryDocumentsRequest $request) 
    {
        $files = $request->file('salary_file');

        $input = $request->all();
        $salaryDocumentTypes = $request->input('salary_document_type');
        $salaryDocuments = $request->file('salary_file');

        try {
            for($i=0; $i< count($input['salary_document_type']); $i++) {
                if (isset($salaryDocuments[$i]) && is_file($salaryDocuments[$i])) {
                    $extension = $salaryDocuments[$i]->getClientOriginalExtension();
                    Storage::disk('google')->put($salaryDocuments[$i]->getClientOriginalName().'.'.$extension, File::get($salaryDocuments[$i]));
                    $url = Storage::disk('google')->url($salaryDocuments[$i]->getClientOriginalName().'.'.$extension, File::get($salaryDocuments[$i]));
                    $userSalaryDocument = new UserSalaryDocument();
                    $userSalaryDocument->user_id = $request->user_id;
                    $userSalaryDocument->salary_document_type = $salaryDocumentTypes[$i];
                    $userSalaryDocument->salary_file = $url;
                    $userSalaryDocument->status = 'pending';
                    $userSalaryDocument->save();
                }
            }
            User::where('id', $request->user_id)->update(array('salary_documents' => true));
        } catch(\Exception $e) {
            return redirect()->route('profile.salary-document.create')->with('error', 'Error while uploading');
        }
        return redirect()->route('profile.salary-document.index')->with('success', 'Files uploaded successfully.');
    }
}
