<?php

namespace App\Http\Controllers;

use App\Models\DynamicPage;
use Illuminate\Http\Request;

class DynamicPageController extends Controller
{
    /**
     * Display all dynamic pages.
     */
    // public function __construct()
    // {
    // $this->middleware(['auth', 'role:Admin']);
    // }

    public function index()
    {
        $pages = DynamicPage::latest()->get();
        return view('backend.layouts.dynamic.index', compact('pages'));
    }

    /**
     * Show the form for creating a new dynamic page.
     */
    public function create()
    {
        return view('backend.layouts.dynamic.create');
    }

    /**
     * Store a newly created dynamic page in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'slug'    => 'required|string|max:255|unique:dynamic_pages,slug',
            'content' => 'nullable|string',
        ]);

        DynamicPage::create($request->only(['title', 'slug', 'content']));

        return redirect()->route('dynamic.index')
                         ->with('success', 'Dynamic page created successfully!');
    }

    /**
     * Show a specific dynamic page.
     */
    public function show(DynamicPage $dynamic)
    {
        return view('backend.layouts.dynamic.show', compact('dynamic'));
    }

    /**
     * Show the form for editing a specific dynamic page.
     */
    public function edit(DynamicPage $dynamic)
    {
        return view('backend.layouts.dynamic.edit', compact('dynamic'));
    }

    /**
     * Update a specific dynamic page in storage.
     */
    public function update(Request $request, DynamicPage $dynamic)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'slug'    => 'required|string|max:255|unique:dynamic_pages,slug,' . $dynamic->id,
            'content' => 'nullable|string',
        ]);

        $dynamic->update($request->only(['title', 'slug', 'content']));

        return redirect()->route('dynamic.index')
                         ->with('success', 'Dynamic page updated successfully!');
    }

    /**
     * Remove a specific dynamic page from storage.
     */
    public function destroy(DynamicPage $dynamic)
    {
        $dynamic->delete();

        return redirect()->route('dynamic.index')
                         ->with('success', 'Dynamic page deleted successfully!');
    }
}
