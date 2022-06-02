<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceValidationRequest;
use App\Models\Service;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Response;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.service.service');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->role === 'branchmanager') {
            return view('admin.service.service');
        }

        if (auth()->user()->role !== 'admin') {
            return back()->with('failed', 'You dont have permission to access this resource');
        }
        return view('admin.service.index');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceValidationRequest $request)
    {
        //    dd('working');
        if ($request->filled('charge') && $request->filled('percentage')) {
            return back()->with('failed', 'You cant input percentage and charge at the same time');
        }

        $service = Service::create($request->validated());
        return redirect()->route('service_create')
            ->with('success', 'Service successfully added');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        if (auth()->user()->role === 'admin') {
            return view('admin.service.edit_service', compact('service'));
        }

        return back()->with('failed', 'You dont have permission to access this resource');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceValidationRequest $request, Service $service)
    {
        $service->update($request->validated());
        return redirect()->route('service_create')
            ->with('success', 'Service successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        if (auth()->user()->role === 'admin') {
            $service->delete();
            return Response::json('success');
        }

        return back()->with('failed', 'You dont have permission to access this resource');
    }

    public function getServices(Request $request)
    {

        if ($request->ajax()) {

            return datatables()->of(Service::query())->toJson();
        }
    }

    public function getServiceCharge(Request $request, Service $service)
    {

        $service_charge = $service->charge + ($service->percentage / 100);
        if ($request->ajax()) {

            return Response::json($service_charge);

        }
    }

}
