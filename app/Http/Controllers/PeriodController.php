<?php

namespace App\Http\Controllers;

use App\Http\Requests\PeriodRequest;
use App\Models\Period;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class PeriodController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Period::class);
        $periods = Period::where('budget_id', '=', Auth::user()->current_budget_id)->orderBy('start_date')->paginate(12);

        return view('periods.index', compact('periods'));
    }

    public function create()
    {
        $this->authorize('create', Period::class);
        return view('periods.create');
    }

    public function store(PeriodRequest $request)
    {
        $this->authorize('create', Period::class);
        $validated = $request->validated();
        $validated['budget_id'] = Auth::user()->current_budget_id;
        Period::create($validated);

        return redirect()->route('period.index')->with('success', 'Period created');
    }

    public function show(Period $period)
    {
        $this->authorize('view', $period);

        return $period;
    }
    public function edit(Period $period)
    {
        $this->authorize('update', $period);
        return view('periods.edit', compact('period'));
    }

    public function update(PeriodRequest $request, Period $period)
    {
        $this->authorize('update', $period);
        $period->update($request->validated());

        return redirect()->route('period.index')->with('success', 'Period updated');
    }

    public function destroy(Period $period)
    {
        $this->authorize('delete', $period);
        $period->delete();

        return redirect()->route('period.index')->with('success', 'Period deleted');
    }
}
