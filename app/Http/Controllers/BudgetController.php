<?php

namespace App\Http\Controllers;

use App\Http\Requests\BudgetRequest;
use App\Models\Budget;
use Illuminate\Support\Facades\Auth;

class BudgetController extends Controller
{
    public function index()
    {
        // TODO paginate
        if (Auth::user()->role == 'admin') {
            $budgets = budget::all();
        } else {
            $budgets = budget::where('user_id', Auth::user()->id)->get();
        }
        return view('budget.index', compact('budgets'));
    }

    public function create() {
        return view('budget.create');
    }

    public function store(BudgetRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->user()->id;
        $newBudget = budget::create($validated);
        if (Auth()->user()->current_budget_id === null) {
            Auth()->user()->update(['current_budget_id' => $newBudget->id]);
        }
        return redirect()->route('budget.index')->with('success', 'Budget created successfully.');
    }

    public function show(budget $budget)
    {
        // TODO Authorization
        return $budget;
    }

    public function update(BudgetRequest $request, budget $budget)
    {
        // TODO Authorization
        $budget->update($request->validated());

        return $budget;
    }

    public function destroy(budget $budget)
    {
        // TODO Authorization
        $budget->delete();

        return response()->json();
    }
}
