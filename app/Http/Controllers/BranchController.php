<?php

namespace App\Http\Controllers;

use App\Http\Requests\BranchValidationRequest;
use App\Models\Branch;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Response;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.branch.branch');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            return back()->with('failed', 'You dont have permission to access this resource');
        }
        return view('admin.branch.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BranchValidationRequest $request)
    {
        $branch = Branch::create($request->validated());
        return redirect()->route('branch_create')
            ->with('success', 'Branch successfully added');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        if (auth()->user()->role === 'admin') {
            return view('admin.branch.edit_branch', compact('branch'));
        }

        return back()->with('failed', 'You dont have permission to access this resource');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(BranchValidationRequest $request, Branch $branch)
    {
        $branch->update($request->validated());
        return redirect()->route('branch_create')
            ->with('success', 'Branch successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        if (auth()->user()->role === 'admin') {
            $branch->delete();
            return Response::json('success');
        }

        return back()->with('failed', 'You dont have permission to access this resource');
    }

    public function getBranches(Request $request)
    {

        if ($request->ajax()) {

            return datatables()->of(Branch::query())->toJson();
        }
    }
}
