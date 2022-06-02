<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExpenseValidationRequest;
use App\Models\Expense;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.expense.transaction');
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
    public function store(ExpenseValidationRequest $request)
    {
        //dd($request->date);
        $dt = Carbon::now();
        $year = Carbon::parse($request->date)->format('Y');

        if ($year > $dt->year) {
            return back()->with('failed', 'Invalid Date');
        }

        $transaction = Expense::create($request->validated());

        return redirect()->route('expense_list')
            ->with('success', 'Expenses successfully added');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('admin.expense.expense');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        $this->checkAdminRole();
        return view('admin.expense.edit_expense', compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(ExpenseValidationRequest $request, Expense $expense)
    {
        $expense->update($request->validated());
        return redirect()->route('expense_list')
            ->with('success', 'Expense successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {

    }

    protected function checkAdminRole()
    {
        if (auth()->user()->role !== 'admin') {
            return back()->with('failed', 'You dont have permission to access this resource');
        }
    }

    public function deleteTransaction(Expense $expense)
    {
        $this->checkAdminRole();
        $expense->delete();
        return Response::json('transaction successfull');

    }

    public function getExpenses(Request $request)
    {

        if ($request->ajax()) {
            // return Response::json('transaction successfull');
            return datatables()->of(Expense::query())->toJson();
        }
    }
}
