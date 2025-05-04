@extends('layouts.theme')

@section('title', 'Features')

@section('header')
<!-- Page Header-->
<header class="masthead" style="background-image: url('{{ asset('theme/assets/img/features-bg.jpg') }}')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>Features</h1>
                    <span class="subheading">What we offer</span>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection

@section('content')
<div class="container py-5">
    <div class="row text-center mb-5">
        <div class="col-12">
            <h2 class="display-4">FEATURES</h2>
            <div class="d-flex justify-content-center">
                <div class="border-bottom border-success" style="width: 50px; margin-top: 15px;"></div>
            </div>
            <p class="mt-4 text-muted">Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit
            </p>

            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="mt-4">
                <a href="{{ route('features.create') }}" class="btn btn-primary">Add New Feature</a>
            </div>
        </div>
    </div>

    <div class="row">
        @forelse($features as $feature)
        <div class="col-md-3 mb-4">
            <div class="card h-100 border-0 p-3">
                <div class="text-center mb-3">
                    @if($feature->image)
                    <img src="{{ Storage::url($feature->image) }}" alt="{{ $feature->title }}" class="img-fluid mb-3"
                        style="max-height: 100px;">
                    @endif
                    <h5 class="card-title">{{ $feature->title }}</h5>
                </div>
                <p class="card-text text-muted">{{ $feature->description }}</p>

                <div class="mt-auto pt-3 d-flex justify-content-end">
                    <a href="{{ route('features.edit', $feature->id) }}" class="btn btn-sm btn-outline-primary me-2">
                        <i class="fa fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('features.destroy', $feature->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this feature?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center">
            <p>No features found. Create your first feature!</p>
        </div>
        @endforelse
    </div>
</div>
@endsection