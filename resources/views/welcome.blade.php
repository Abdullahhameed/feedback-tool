@extends('layouts.frontend-app')
@section('content')
    <section>
        @include('layouts.flash-message')
        <h2>FEED BACK List</h2>
        <div class="row">
            @forelse ($feedbacks as $feedback)
                <div class="cards">
                    <div class="cards-box">
                        <h1 class="cards-title">{{ Str::ucfirst($feedback->title) ?? 'N/A' }} --
                            {{ Str::ucfirst($feedback->category) ?? 'N/A' }}</h1>
                        <div class="cards-content">
                            <p>
                                {!! $feedback->description !!}
                            </p>
                        </div>
                    </div>

                    <div class="cards-footer" x-data="{ open: false }">
                        <a href="#" class="btnBorder" type="button" x-on:click="open = ! open">Comment</a>
                        <strong class="badge">{{ Str::ucfirst($feedback->user?->name) ?? 'N/A' }}</strong>
                        <form action="{{ route('save-comment') }}" method="post" action="" x-show="open"
                            x-transition>
                            @method('POST')
                            @csrf
                            <textarea class="editor" name="content"></textarea>
                            <button class="comment-post" type="submit">
                                Post Comment
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="show-message">
                    No Feedback Found
                </div>
            @endforelse
            {{ $feedbacks->links('pagination::bootstrap-4') }}
        </div>
    </section>
@endsection
