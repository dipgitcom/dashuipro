@extends('backend.master')

@section('title','FAQ')

@section('content')
<div class="container py-4">
    <h3 class="mb-4">Frequently Asked Questions</h3>

    <a href="{{ route('faq.create') }}" class="btn btn-sm btn-primary mb-3">Add New FAQ</a>

    <div class="accordion" id="faqAccordion">
        @foreach($faqs as $faq)
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading{{ $faq->id }}">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}">
                    {{ $faq->question }}
                </button>
            </h2>
            <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    {!! $faq->answer !!}
                    <div class="mt-2">
                        <a href="{{ route('faq.edit', $faq->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('faq.destroy', $faq->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
