@extends('layouts.main')
@section('content')
    <!-- Header Banner -->
    <div class="banner-header valign bg-img bg-fixed" data-overlay-dark="4" data-background="/images/slider/2.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 caption mt-60">
                    <div class="subtitle"><a href="/">Home</a></div>
                    <div class="title"> Blog </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog -->
    <section class="blog-home section-padding">
        <div class="container">
        <div class="row">
            @foreach ($blog as $blogs)
            <div class="col-md-4">
                <div class="item mb-5">
                    <div class="post-img">
                        <a href="{{ route('blog.detail', $blogs->slug) }}"><div class="img"> <img src="{{ asset('upload/blog/'.$blogs->image) }}" alt=""> </div></a>
                    </div>
                    <div class="cont">
                        <h4><a href="{{ route('blog.detail', $blogs->slug) }}">{{ $blogs->title }}</a></h4>
                        <div class="info"> <a href="{{ route('blog.detail', $blogs->slug) }}"><span>{{ $blogs->category->title }}</span></a> <a href="{{ route('blog.detail', $blogs->slug) }}">{{ $blogs->created_at->format('d M Y') }}</a> </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        </div>
    </section>
@endsection