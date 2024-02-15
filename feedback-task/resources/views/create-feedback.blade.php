@extends('layouts.frontend-app')

@section('content')
    <section>
        @include('layouts.flash-message')
        <h2>
            FEED BACK FORM
        </h2>
        <div class="form-container">
            <div class="row">
                <form action="{{ route('save-feedback') }}" method="POST" data-parsley-validate>
                    @method('POST')
                    @csrf
                    <div class="row">
                        <div class="col-25">
                            <label for="title">Title</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="title" class="@error('title') parsley-error @enderror"
                                name="title" placeholder="Enter title here..." required>
                            @error('title')
                                <p class="error-message">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="category">Category</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="category" class="@error('category') parsley-error @enderror"
                                name="category" placeholder="Enter category here..." required>
                            @error('category')
                                <p class="error-message">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="description">Description</label>
                        </div>
                        <div class="col-75">
                            <textarea class="@error('description') parsley-error @enderror" id="description" name="description"
                                placeholder="Enter description here..." style="height: 100px" required></textarea>
                            @error('description')
                                <p class="error-message">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <input type="submit" value="Submit">
                        <a class="backBtn" href="{{ url()->previous() }}">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
