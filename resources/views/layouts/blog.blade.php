@extends('layouts.theme')

@section('title', 'Blog Post')

@section('header')
<!-- Page Header-->
<header class="masthead" style="background-image: url('{{ asset('theme/assets/img/post-bg.jpg') }}')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1>Man must explore, and this is exploration at its greatest</h1>
                    <h2 class="subheading">Problems look mighty small from 150 miles up</h2>
                    <span class="meta">
                        Posted by
                        <a href="#!">Start Bootstrap</a>
                        on August 24, 2023
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection

@section('content')
<!-- Post Content-->
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p>Never in all their history have men been able truly to conceive of the world as one: a single sphere,
                    a globe, having the qualities of a globe, a round earth in which all the directions eventually meet,
                    in which there is no center because every point, or none, is center — an equal earth which all men
                    occupy as equals. The airman's earth, if free men make it, will be truly round: a globe in practice,
                    not in theory.</p>
                <p>Science cuts two ways, of course; its products can be used for both good and evil. But there's no
                    turning back from science. The early warnings about technological dangers also come from science.
                </p>
                <p>What was most significant about the lunar voyage was not that man set foot on the Moon but that they
                    set eye on the earth.</p>
            </div>
        </div>
    </div>
</article>
@endsection