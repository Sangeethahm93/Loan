<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EducationType;
use App\Models\LoanApplication;
use App\Http\Requests\StoreLoanApplicationRequest;
use App\Models\Status;
use App\Models\Role;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoanApplicationsController extends Controller
{
    public function index() {
        abort_if(Gate::denies('loan_application_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $loanApplications = LoanApplication::with('status', 'analystOne', 'analystTwo')->get();
        $defaultStatus    = Status::find(1);
        $user             = auth()->user();

        return view('admin.loan-applications.index', compact('loanApplications', 'defaultStatus', 'user'));
    }

    public function create() {
        abort_if(Gate::denies('loan_application_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.loan-applications.create');
    }

    public function store(StoreLoanApplicationRequest $request)
    {
        $loanApplication = LoanApplication::create($request->only('loan_amount', 'loan_purpose', 'loan_tenure', 'description'));

        return redirect()->route('admin.loan-applications.index');
    }

    public function show(LoanApplication $loanApplication) {
        abort_if(Gate::denies('loan_application_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $loanApplication->load('status', 'analystOne', 'analystTwo', 'createdBy');
        $defaultStatus = Status::find(1);
        $user          = auth()->user();

        return view('admin.loan-applications.show', compact('loanApplication', 'defaultStatus', 'user'));
    }

    public function showSend(LoanApplication $loanApplication)
    {
        abort_if(!auth()->user()->is_admin, Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($loanApplication->status_id == 1) {
            $role = 'Analyst one';
            $users = Role::find(3)->users->pluck('name', 'id');
        } else if (in_array($loanApplication->status_id, [3,4])) {
            $role = 'Analyst two';
            $users = Role::find(4)->users->pluck('name', 'id');
        } else {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        return view('admin.loan-applications.send', compact('loanApplication', 'role', 'users'));
    }

    public function send(Request $request, LoanApplication $loanApplication)
    {
        abort_if(!auth()->user()->is_admin, Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($loanApplication->status_id == 1) {
            $column = 'analyst1_id';
            $users  = Role::find(3)->users->pluck('id');
            $status = 2;
        } else if (in_array($loanApplication->status_id, [3,4])) {
            $column = 'analyst2_id';
            $users  = Role::find(4)->users->pluck('id');
            $status = 5;
        } else {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $request->validate([
            'user_id' => 'required|in:' . $users->implode(',')
        ]);

        $loanApplication->update([
            $column => $request->user_id,
            'status_id' => $status
        ]);

        return redirect()->route('admin.loan-applications.index')->with('message', 'Loan application has been sent for analysis');
    }

    public function showAnalyze(LoanApplication $loanApplication)
    {
        $user = auth()->user();

        abort_if(
            (!$user->is_analystOne || $loanApplication->status_id != 2) && (!$user->is_analystTwo || $loanApplication->status_id != 5),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        return view('admin.loan-applications.analyze', compact('loanApplication'));
    }

    public function analyze(Request $request, LoanApplication $loanApplication)
    {
        $user = auth()->user();

        if ($user->is_analystOne && $loanApplication->status_id == 2) {
            $status = $request->has('approve') ? 3 : 4;
        } else if ($user->is_analystTwo && $loanApplication->status_id == 5) {
            $status = $request->has('approve') ? 6 : 7;
        } else {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $request->validate([
            'comment_text' => 'required'
        ]);

        $loanApplication->comments()->create([
            'comment_text' => $request->comment_text,
            'user_id'      => $user->id
        ]);

        $loanApplication->update([
            'status_id' => $status
        ]);

        return redirect()->route('admin.loan-applications.index')->with('message', 'Analysis has been submitted');
    }
}
