<?php

namespace App\Http\Controllers;

use App\Http\Requests\EntityRequest;
use App\Models\Entity;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class EntityController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Entity::class);

        $entities = Entity::where('budget_id', '=', Auth::user()->current_budget_id)->paginate(10);
        return view('entities.index', compact('entities'));
    }

    public function create()
    {
        $this->authorize('create', Entity::class);
        return view('entities.create');
    }

    public function store(EntityRequest $request)
    {
        $this->authorize('create', Entity::class);
        $validated = $request->validated();
        $validated['budget_id'] = Auth::user()->current_budget_id;
        Entity::create($validated);

        return redirect()->route('entity.index')->with('success', 'Entity created.');
    }

    public function show(Entity $entity)
    {
        $this->authorize('view', $entity);

        return $entity;
    }

    public function edit(Entity $entity)
    {
        $this->authorize('update', $entity);
        return view('entities.edit', compact('entity'));
    }

    public function update(EntityRequest $request, Entity $entity)
    {
        $this->authorize('update', $entity);
        $entity->update($request->validated());

        return redirect()->route('entity.index')->with('success', 'Entity updated.');
    }

    public function destroy(Entity $entity)
    {
        $this->authorize('delete', $entity);
        $entity->delete();

        return redirect()->route('entity.index')->with('success', 'Entity deleted.');
    }
}
