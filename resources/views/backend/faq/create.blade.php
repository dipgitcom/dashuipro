@extends('backend.master')

@section('title','Add FAQ')

@section('content')
<div class="container py-4">
    <h3 class="mb-4">Add New FAQ</h3>

    <form action="{{ route('faq.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Question</label>
            <input type="text" name="question" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Answer</label>
            <textarea name="answer" class="form-control" rows="5" required></textarea>
        </div>
        <button class="btn btn-success">Save FAQ</button>
    </form>
</div>
@endsection
