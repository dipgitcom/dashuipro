<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::latest()->get();
        return view('backend.faq.index', compact('faqs'));
    }

    // Optional: Admin CRUD for FAQs
    public function create() { return view('backend.faq.create'); }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);

        Faq::create($request->only('question','answer'));

        return redirect()->route('faq.index')->with('success','FAQ added successfully.');
    }

    public function edit(Faq $faq) { return view('backend.faq.edit', compact('faq')); }

    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);

        $faq->update($request->only('question','answer'));

        return redirect()->route('faq.index')->with('success','FAQ updated successfully.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('faq.index')->with('success','FAQ deleted successfully.');
    }
}
