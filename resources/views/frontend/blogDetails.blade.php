@extends('layouts.main')
@section('content')
    <!-- Header Banner -->
    <div class="banner-header valign bg-img bg-fixed" data-overlay-dark="4" data-background="/images/slider/2.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 caption mt-60">
                    <div class="subtitle"><a href="/">Home</a></div>
                    <div class="title"> Blog Details </div>
                </div>
            </div>
        </div>
    </div>
<section class="post section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 animate-box" data-animate-effect="fadeInUp"> 
                <img src="{{ asset('upload/blog/'.$post->image) }}" class="img-responsive mb-5" alt="">
                <div class="date"> <span class="ti-time"></span> {{ $post->created_at->format('d M Y')}} <span class="ti-tag"></span> {{ $post->category->title }} </div>
                <h2>{{ $post->title }}</h2>
                <p>
                    {{ $post->content }}
                </p>
            </div>
        </div>
    </div>
</section>
@endsection