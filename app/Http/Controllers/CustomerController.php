<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerValidationRequest;
use App\Models\Customer;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Response;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.customer');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerValidationRequest $request)
    {
        //dd($request->validated());

        $customer = Customer::create($request->validated());

        if ($customer) {
            $customer->customer_photo = $this->uploadFile($request);
            $customer->created_at = date('Y-m-d', strtotime('now'));
            $customer->updated_at = date('Y-m-d', strtotime('now'));
            $customer->save();
            return redirect()->route('customer_create')
                ->with('success', 'Customer successfully added');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('admin.view_customer', compact('customer'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        if (auth()->user()->role === 'admin') {
            return view('admin.edit_customer', compact('customer'));
        }

        return back()->with('failed', 'You dont have permission to access this resource');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerValidationRequest $request, Customer $customer)
    {
        $customer->update($request->validated());
        return redirect()->route('customer_create')
            ->with('success', 'Customer successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        if (auth()->user()->role === 'admin') {
            $customer->delete();
            return Response::json('success');

        }

        return back()->with('failed', 'You dont have permission to access this resource');
    }

    public function getCustomers(Request $request)
    {

        if ($request->ajax()) {

            $customer_query = Customer::where('user_id', Auth::id())
                ->where('branch_id', auth()->user()->branch_id)
                ->get();

            if (auth()->user()->role === 'creditofficer') {
                return datatables()->of($customer_query)->toJson();
            }

            return datatables()->of($customer_query)->toJson();
        }
    }

    private function uploadFile(Request $request)
    {
        // dd($request->file('photo'));

        if ($request->hasFile('customer_photo')) {

            $photo = $request->file('customer_photo');
            $imagename = $request->customer_name . '-photo-image' . time() . '.' . $photo->getClientOriginalExtension();
            $photo->storeAs('public/uploads', $imagename);
            return $imagename ?? null;
        }
    }

}
