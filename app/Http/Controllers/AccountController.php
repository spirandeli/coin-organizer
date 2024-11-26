<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        return Account::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        return Account::create($validated);
    }

    public function show(Account $account)
    {
        return $account;
    }

    public function update(Request $request, Account $account)
    {
        $account->update($request->all());
        return $account;
    }

    public function destroy(Account $account)
    {
        $account->delete();
        return response()->json(['message' => 'Account deleted successfully']);
    }
}
