<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoanPurposeRequest;
use App\Http\Requests\UpdateLoanPurposeRequest;
use App\Models\LoanPurpose;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoanPurposesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('loan_purpose_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $loanPurposes = LoanPurpose::all();

        return view('admin.loan-purposes.index', compact('loanPurposes'));
    }

    public function create()
    {
        abort_if(Gate::denies('loan_purpose_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.loan-purposes.create');
    }

    public function store(StoreLoanPurposeRequest $request)
    {
        $loanPurpose = LoanPurpose::create($request->all());

        return redirect()->route('admin.loan-purposes.index');
    }

    public function show(LoanPurpose $loanPurpose)
    {
        abort_if(Gate::denies('loan_purpose_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.loan-purposes.show', compact('loanPurpose'));
    }

    public function edit(LoanPurpose $loanPurpose)
    {
        abort_if(Gate::denies('loan_purpose_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.loan-purposes.edit', compact('loanPurpose'));
    }

    public function update(UpdateLoanPurposeRequest $request, LoanPurpose $loanPurpose)
    {
        $loanPurpose->update($request->all());

        return redirect()->route('admin.loan-purposes.index');
    }

    public function destroy(LoanPurpose $loanPurpose)
    {
        abort_if(Gate::denies('loan_purpose_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $loanPurpose->delete();

        return back();
    }
}
