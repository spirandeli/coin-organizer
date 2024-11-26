<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function index()
    {
        return Budget::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'amount' => 'required|numeric',
        ]);

        return Budget::create($validated);
    }

    public function show(Budget $budget)
    {
        return $budget;
    }

    public function update(Request $request, Budget $budget)
    {
        $budget->update($request->all());
        return $budget;
    }

    public function destroy(Budget $budget)
    {
        $budget->delete();
        return response()->json(['message' => 'Budget deleted successfully']);
    }
}
