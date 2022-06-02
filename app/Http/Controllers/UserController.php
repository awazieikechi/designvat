<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\CreateNewUser;
use App\Models\Branch;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        $branches = Branch::all();
        return view('role.register', compact('branches'));
    }

    public function store(Request $request)
    {
        $newuser = new CreateNewUser();
        $newuser->create($request->all());
        return redirect()->route('role_create')
            ->with('success', 'User successfully added');
    }

    public function edit(Request $request)
    {
        $user = User::find($request->id);
        return view('admin.bank.edit_debit', compact('bank', 'customer'));

    }

    public function update()
    {
    }
}
