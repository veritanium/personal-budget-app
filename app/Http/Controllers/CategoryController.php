<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $categories = Category::where('budget_id', '=', Auth::user()->current_budget_id)->orderBy('name')->paginate(25);

        return view('categories.index', compact('categories'));
    }

    public function create() {
        return view('categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $this->authorize('create', Category::class);

        $validated = $request->validated();
        $validated['budget_id'] = Auth::user()->current_budget_id;

        Category::create($validated);
        return redirect()->route('category.index')->with('success', 'Category created successfully.');
    }

    public function show(Category $category)
    {
        $this->authorize('view', $category);

        return $category;
    }

    public function edit(Category $category) {
        return view('categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $this->authorize('update', $category);

        $category->update($request->validated());

        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $this->authorize('delete', $category);

        $category->delete();

        return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
    }
}
