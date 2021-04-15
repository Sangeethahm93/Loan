<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEducationTypeRequest;
use App\Http\Requests\UpdateEducationTypeRequest;
use App\Models\EducationType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class EducationTypesController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('education_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $educationTypes = EducationType::all();
        return view('admin.education-types.index', compact('educationTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('education_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.education-types.create');
    }

    public function store(StoreEducationTypeRequest $request)
    {
        $educationType = EducationType::create($request->all());

        return redirect()->route('admin.education-types.index');
    }

    public function edit(EducationType $educationType)
    {
        abort_if(Gate::denies('education_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.education-types.edit', compact('educationType'));
    }

    public function update(UpdateEducationTypeRequest $request, EducationType $educationType)
    {
        $educationType->update($request->all());

        return redirect()->route('admin.education-types.index');
    }

    public function show(EducationType $educationType)
    {
        abort_if(Gate::denies('education_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.education-types.show', compact('educationType'));
    }

    public function destroy(EducationType $educationType)
    {
        abort_if(Gate::denies('education_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $educationType->delete();

        return back();
    }
}
