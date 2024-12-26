<?php

namespace App\Http\Controllers;

use App\Http\Requests\BudgetRequest;
use App\Models\Budget;
use App\Models\Category;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BudgetController extends Controller
{
    use AuthorizesRequests;

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
        $this->authorize('create', Budget::class);
        $validated = $request->validated();
        $validated['user_id'] = auth()->user()->id;
        $newBudget = Budget::create($validated);
        if (Auth()->user()->current_budget_id === null) {
            Auth()->user()->update(['current_budget_id' => $newBudget->id]);
        }
        return redirect()->route('budget.index')->with('success', 'Budget created successfully.');
    }

    public function show(Budget $budget)
    {
        $this->authorize('view', $budget);
        return $budget;
    }

    public function edit(Budget $budget) {
        $this->authorize('edit', $budget);
        return view('budget.edit', compact('budget'));
    }

    public function update(BudgetRequest $request, Budget $budget)
    {
        $this->authorize('update', $budget);
        $budget->update($request->validated());

        return redirect()->route('budget.index')->with('success', 'Budget updated successfully.');
    }

    public function destroy(Budget $budget)
    {
        $this->authorize('delete', $budget);
        $budget->delete();

        //TODO success message alerts
        return redirect()->route('budget.index')->with('success', 'Budget deleted successfully.');
    }
}
