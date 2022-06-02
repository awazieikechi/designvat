<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function show()
    {
        return view('admin.report.index');
    }

    public function showCustomer()
    {
        return view('admin.report.customer');
    }

    public function showIncome()
    {
        return view('admin.report.sale');
    }

    protected function checkAdminRole()
    {
        if (auth()->user()->role !== 'admin') {
            return back()->with('failed', 'You dont have permission to access this resource');
        }
    }

}
