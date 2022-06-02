<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaleValidationRequest;
use App\Models\Customer;
use App\Models\Sales;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Response;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $query = Sales::with(['customer', 'service'])->select('sales.*');
        //dd(datatables()->eloquent($query)->toJson());
        return view('admin.sale.transaction');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaleValidationRequest $request)
    {
        $sales_transaction = Sales::create($request->validated());

        $this->updateCustomerTransaction($sales_transaction);

        return redirect()->route('sale_transaction')
            ->with('success', 'Transaction successfully done');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function show(Sales $sales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function edit(Sales $sales)
    {
        $this->checkAdminRole();

        $customer = $this->getCustomer($sales->customer_id);
        $service = $this->getService($sales->service_id);
        $services = $this->getServices();

        if ($sales->type === 'Credit Sales') {
            return view('admin.sale.edit_sale', compact('sales', 'customer', 'service', 'services'));

        }

        if ($sales->type === 'Payment') {
            return view('admin.sale.edit_payment', compact('sales', 'customer'));

        }

        return view('admin.sale.edit_loan', compact('sales', 'customer', 'service', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function update(SaleValidationRequest $request, Sales $sales)
    {
        $saleTransactionId = $sales->id;
        $roll_back_transaction = $this->rollBackCustomerTransaction($sales);

        if ($roll_back_transaction) {
            $sales->update($request->validated());
            $salesTransaction = Sales::find($saleTransactionId);
            $this->updateCustomerTransaction($salesTransaction);
            return redirect()->route('sale_transaction')
                ->with('success', 'Transaction successfully updated');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sales $sales)
    {
        
    }

    public function showSale()
    {

        $this->checkAdminRole();

        $customers = $this->getCustomers();
        $services = $this->getServices();

        return view('admin.sale.sale', compact('customers', 'services'));

    }

    public function showPayment()
    {

        $this->checkAdminRole();

        $customers = $this->getCustomers();

        return view('admin.sale.payment', compact('customers'));}

    public function showLoan()
    {

        $this->checkAdminRole();

        $customers = $this->getCustomers();
        $services = $this->getServices();

        return view('admin.sale.loan', compact('customers', 'services'));}

    protected function checkAdminRole()
    {
        if (auth()->user()->role !== 'admin') {
            return back()->with('failed', 'You dont have permission to access this resource');
        }
    }

    protected function getCustomers()
    {return Customer::all();}

    protected function getServices()
    {return Service::all();}

    /** Get all Transactions */

    public function getSales(Request $request)
    {
        $query = Sales::with(['customer', 'service'])->select('sales.*');
        if ($request->ajax()) {
            // return Response::json('transaction successfull');
            return datatables()->eloquent($query)->toJson();
        }
    }

    /** Credit Transaction */

    protected function credit($sales_transaction, $service_charge)
    {
        $customer = $this->getCustomer($sales_transaction->customer_id);

        if ($sales_transaction->type === 'Payment') {

            $customer->other_transactions -= $sales_transaction->revenue_amount;

            return $customer->save();
        }

        $customer->other_transactions += $service_charge;

        $customer->save();
    }

    protected function loan($sales_transaction)
    {

        $customer = $this->getCustomer($sales_transaction->customer_id);
        $customer->other_transactions += ($sales_transaction->loan_amount + $sales_transaction->revenue_amount);
        $customer->save();

    }

    /**Roll Back Customer transaction */

    protected function rollBackCustomerTransaction($sales_transaction)
    {

        $customer = $this->getCustomer($sales_transaction->customer_id);
        $service_charge = $this->getServiceCharge($sales_transaction);

        if ($sales_transaction->type === 'Loan') {

            $customer->other_transactions -= ($sales_transaction->loan_amount + $sales_transaction->revenue_amount);
        }

        if ($sales_transaction->type === 'Payment') {

            $customer->other_transactions += $service_charge;
        }

        $customer->other_transactions -= $service_charge;

        return $customer->save();

    }

    /*** Updated and New Delete Transaction */

    public function deleteTransaction(Sales $sales)
    {
        $this->checkAdminRole();
        $delete_transaction = $this->rollBackCustomerTransaction($sales);
        if ($delete_transaction) {
            $sales->delete();
        }
        return Response::json('transaction successfull');

    }

/*** Get Customer Balance */
    public function getCustomerOutstandingBalance(Request $request)
    {
        $customer_id = $request->id;
        $customer = $this->getCustomer($customer_id);
        $balance = $customer->account_balance - $customer->other_transactions;

        if ($request->ajax()) {

            return Response::json($balance);

        }

        return $balance;

    }

    protected function getCustomer($customer_id)
    {

        return Customer::where('id', $customer_id)->first();
    }

    public function getService($service_id)
    {

        return Service::where('id', $service_id)->first();
    }

    public function updateCustomerTransaction($sales_transaction)
    {

        $service_charge = $this->getServiceCharge($sales_transaction);

        if ($sales_transaction->type === 'Loan') {

            return $this->loan($sales_transaction);
        }

        return $this->credit($sales_transaction, $service_charge);
    }

    protected function getServiceCharge($sales_transaction)
    {
        $service = Service::find($sales_transaction->service_id);
        // dd($sales_transaction->id);
        if ($service === null) {
            $service_charge = 0;
            return $service_charge;
        }
        $service_charge = $service->charge + ($service->percentage / 100);
        return $service_charge;
    }

}
