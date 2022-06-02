<?php

namespace App\Http\Controllers;

use App\Http\Requests\BankValidationRequest;
use App\Models\Bank;
use App\Models\Customer;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Response;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(Bank::with('customer')->get());
        //dd (datatables()->of(Bank::with('customer')->get())->toJson());
        return view('admin.bank.transaction');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BankValidationRequest $request)
    {
        $transaction = Bank::create($request->validated());

        $this->updateCustomerTransaction($transaction);

        return redirect()->route('bank_transaction')
            ->with('success', 'Transaction successfully done');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit(Bank $bank)
    {

        $this->checkAdminRole();

        $customer = $this->getCustomer($bank->customer_id);

        if ($bank->transaction_type === 'Debit') {
            return view('admin.bank.edit_debit', compact('bank', 'customer'));

        }

        return view('admin.bank.edit_credit', compact('bank', 'customer'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(BankValidationRequest $request, Bank $bank)
    {
        $transactionId = $bank->id;
        $roll_back_transaction = $this->rollBackCustomerTransaction($bank);

        if ($roll_back_transaction) {
            $bank->update($request->validated());
            $transaction = Bank::find($transactionId);
            $this->updateCustomerTransaction($transaction);
            return redirect()->route('bank_transaction')
                ->with('success', 'Transaction successfully updated');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank)
    {

    }

    /**Showthe Debit Form */

    public function showDebit()
    {
        $this->checkAdminRole();

        $customers = $this->getCustomers();

        return view('admin.bank.debit', compact('customers'));}

    /**Show the Credit Form */

    public function showCredit()
    {

        $this->checkAdminRole();

        $customers = $this->getCustomers();

        return view('admin.bank.credit', compact('customers'));}

    /** Get all Customers  */

    protected function checkAdminRole()
    {
        if (auth()->user()->role !== 'admin') {
            return back()->with('failed', 'You dont have permission to access this resource');
        }
    }

    protected function getCustomers()
    {return Customer::all();}

    /** Get all Transactions */

    public function getTransactions(Request $request)
    {

        if ($request->ajax()) {

            return datatables()->of(Bank::with('customer')->get())->toJson();
        }
    }

    /** Credit Transaction */

    protected function credit($transaction)
    {
        $customer = $this->getCustomer($transaction->customer_id);
        $customer->account_balance += $transaction->deposits;
        $customer->save();
    }

    /**Withdrawal transaction */

    protected function debit($transaction)
    {

        $customer = $this->getCustomer($transaction->customer_id);
        $customer->account_balance -= $transaction->withrawals;
        $customer->save();

    }

    /**Roll Back Customer transaction */

    protected function rollBackCustomerTransaction($transaction)
    {

        $customer = $this->getCustomer($transaction->customer_id);

        if ($transaction->transaction_type === 'Credit') {

            $customer->account_balance -= $transaction->deposits;
        }

        if ($transaction->transaction_type === 'Debit') {

            $customer->account_balance -= $transaction->withrawals;
        }

        return $customer->save();

    }

    /*** Updated and New Delete Transaction */

    public function deleteTransaction(Bank $bank)
    {
        if (auth()->user()->role === 'admin') {

            $delete_transaction = $this->rollBackCustomerTransaction($bank);
            if ($delete_transaction) {
                $bank->delete();
            }
            return Response::json('transaction successfull');

        }

        return back()->with('failed', 'You dont have permission to access this resource');
    }

/*** Get Customer Balance */
    public function getCustomerBalance(Request $request)
    {
        $customer_id = $request->id;
        $customer = $this->getCustomer($customer_id);
        $balance = $customer->account_balance - $customer->other_transactions;

        if ($request->ajax()) {

            return Response::json($balance);

        }

        return $balance;

    }

    public function getCustomerOutstandingBalance(Request $request)
    {
        $customer_id = $request->id;
        $customer = $this->getCustomer($customer_id);
        $balance = $customer->other_transactions;

        if ($request->ajax()) {

            if ($balance === null) {
                $balance = 0;
            }
            return Response::json($balance);

        }

        return $balance;

    }

    protected function getCustomer($customer_id)
    {

        return Customer::where('id', $customer_id)->first();
    }

    public function updateCustomerTransaction($transaction)
    {

        if ($transaction->transaction_type === 'Credit') {

            return $this->credit($transaction);
        }

        if ($transaction->transaction_type === 'Debit') {

            return $this->debit($transaction);
        }

    }

}
