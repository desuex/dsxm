<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Chain;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chains = Chain::paginate(10);
        return view('dashboard.chains.index', compact('chains'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.chains.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:chains,slug',
            'category_id' => 'required|exists:categories,id',
            'short_description' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|array',
            'canonical_url' => 'nullable|url',
        ]);

        $data['slug'] = $data['slug'] ?? Str::slug($data['name']);

        Chain::create($data);

        return redirect()->route('dashboard.chains.index')->with('success', 'Chain created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chain $chain)
    {
        $categories = Category::all();
        return view('dashboard.chains.edit', compact('chain', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chain $chain)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:chains,slug',
            'category_id' => 'required|exists:categories,id',
            'short_description' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|array',
            'canonical_url' => 'nullable|url',
        ]);

        $data['slug'] = $data['slug'] ?? Str::slug($data['name']);

        $chain->update($data);

        return redirect()->route('dashboard.chains.index')->with('success', 'Chain updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chain $chain)
    {
        $chain->delete();
        return redirect()->route('dashboard.chains.index')->with('success', 'Chain deleted successfully.');
    }
}
