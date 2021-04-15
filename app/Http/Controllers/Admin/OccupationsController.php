<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOccupationRequest;
use App\Http\Requests\UpdateOccupationRequest;
use App\Models\Occupation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class OccupationsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('occupation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $occupations = Occupation::all();
        return view('admin.occupations.index', compact('occupations'));
    }

    public function create()
    {
        abort_if(Gate::denies('occupation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.occupations.create');
    }

    public function store(StoreOccupationRequest $request)
    {
        $occupation = Occupation::create($request->all());

        return redirect()->route('admin.occupations.index');
    }

    public function show(Occupation $occupation)
    {
        abort_if(Gate::denies('occupation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.occupations.show', compact('occupation'));
    }

    public function edit(Occupation $occupation)
    {
        abort_if(Gate::denies('occupation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.occupations.edit', compact('occupation'));
    }

    public function update(UpdateOccupationRequest $request, Occupation $occupation)
    {
        $occupation->update($request->all());

        return redirect()->route('admin.occupations.index');
    }

    public function destroy(Occupation $occupation)
    {
        abort_if(Gate::denies('occupation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $occupation->delete();

        return back();
    }
}
