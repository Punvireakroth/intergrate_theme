@extends('layouts.theme')

@section('title', 'Edit Feature')

@section('header')
<!-- Page Header-->
<header class="masthead" style="background-image: url('{{ asset('theme/assets/img/features-bg.jpg') }}')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>Edit Feature</h1>
                    <span class="subheading">Update an existing feature</span>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Feature: {{ $feature->title }}</div>
                <div class="card-body">
                    <form action="{{ route('features.update', $feature->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name="title" value="{{ old('title', $feature->title) }}" required>
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                                name="description" rows="3"
                                required>{{ old('description', $feature->description) }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Feature Image</label>
                            @if($feature->image)
                            <div class="mb-2">
                                <img src="{{ Storage::url($feature->image) }}" alt="{{ $feature->title }}"
                                    class="img-thumbnail" style="max-height: 150px;">
                            </div>
                            @endif
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                                name="image">
                            <small class="form-text text-muted">Upload a new image to replace the current one (JPG, PNG,
                                GIF up to 2MB)</small>
                            @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('features.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update Feature</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection