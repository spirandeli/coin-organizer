<?php

namespace App\Http\Controllers;

use App\Models\RecurringTransaction;
use Illuminate\Http\Request;

class RecurringTransactionController extends Controller
{
    public function index()
    {
        return RecurringTransaction::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'account_id' => 'required|exists:accounts,id',
            'category_id' => 'nullable|exists:categories,id',
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
            'frequency' => 'required|string|max:255',
        ]);

        return RecurringTransaction::create($validated);
    }

    public function show(RecurringTransaction $recurringTransaction)
    {
        return $recurringTransaction;
    }

    public function update(Request $request, RecurringTransaction $recurringTransaction)
    {
        $recurringTransaction->update($request->all());
        return $recurringTransaction;
    }

    public function destroy(RecurringTransaction $recurringTransaction)
    {
        $recurringTransaction->delete();
        return response()->json(['message' => 'Recurring transaction deleted successfully']);
    }
}
