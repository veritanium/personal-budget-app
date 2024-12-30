<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\Account;
use App\Models\Category;
use App\Models\Entity;
use App\Models\Transaction;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Transaction::class);
        $transactions = Transaction::with(['account', 'category', 'entity'])->where('budget_id', '=', Auth::user()->current_budget_id)->cursorPaginate(25);

        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $this->authorize('create', Transaction::class);
        $accounts = Account::where('budget_id', '=', Auth::user()->current_budget_id)->get();
        $categories = Category::where('budget_id', '=', Auth::user()->current_budget_id)->get();
        $entities = Entity::where('budget_id', '=', Auth::user()->current_budget_id)->get();
        return view('transactions.create', compact('accounts', 'categories', 'entities'));
    }

    public function store(transactionRequest $request)
    {
        $this->authorize('create', Transaction::class);
        $validated = $request->validated();
        $validated['budget_id'] = Auth::user()->current_budget_id;
        Transaction::create($validated);

        return redirect()->route('transaction.index')->with('success', 'Transaction created.');
    }

    public function show(Transaction $transaction)
    {
        $this->authorize('view', $transaction);

        return $transaction;
    }

    public function edit(Transaction $transaction)
    {
        $this->authorize('update', $transaction);
        return view('transactions.edit', compact('transaction'));
    }

    public function update(TransactionRequest $request, Transaction $transaction)
    {
        $this->authorize('update', $transaction);
        $transaction->update($request->validated());

        return redirect()->route('transaction.index')->with('success', 'Transaction updated.');
    }

    public function destroy(Transaction $transaction)
    {
        $this->authorize('delete', $transaction);
        $transaction->delete();

        return redirect()->route('transaction.index')->with('success', 'Transaction deleted.');
    }
}
