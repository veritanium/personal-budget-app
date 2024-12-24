<?php

namespace App\Http\Controllers;

use App\Http\Requests\budgetRequest;
use App\Models\budget;
use Illuminate\Support\Facades\Auth;

class budgetController extends Controller
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

    public function store(budgetRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->user()->id;
        return budget::create($validated);
    }

    public function show(budget $budget)
    {
        // TODO Authorization
        return $budget;
    }

    public function update(budgetRequest $request, budget $budget)
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
