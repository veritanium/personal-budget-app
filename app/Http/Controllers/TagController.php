<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Tag::class);
        $tags = Tag::where('budget_id', '=', Auth::user()->current_budget_id)->paginate(15);

        return view('tags.index', compact('tags'));
    }

    public function create()
    {
        $this->authorize('create', Tag::class);
        return view('tags.create');
    }

    public function store(TagRequest $request)
    {
        $this->authorize('create', Tag::class);
        $validated = $request->validated();
        $validated['budget_id'] = Auth::user()->current_budget_id;
        Tag::create($validated);

        return redirect()->route('tag.index')->with('success', 'Tag created.');
    }

    public function show(Tag $tag)
    {
        $this->authorize('view', $tag);

        return $tag;
    }

    public function edit(Tag $tag)
    {
        $this->authorize('update', $tag);
        return view('tags.edit', compact('tag'));
    }

    public function update(TagRequest $request, Tag $tag)
    {
        $this->authorize('update', $tag);
        $tag->update($request->validated());

        return redirect()->route('tag.index')->with('success', 'Tag updated.');
    }

    public function destroy(Tag $tag)
    {
        $this->authorize('delete', $tag);
        $tag->delete();

        return redirect()->route('tag.index')->with('success', 'Tag deleted.');
    }
}
