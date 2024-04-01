@extends('layouts.main')
@section('content')
    <!-- Header Banner -->
    <div class="banner-header valign bg-img bg-fixed" data-overlay-dark="4" data-background="images/slider/2.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 caption mt-60">
                    <div class="subtitle"><a href="/">Home</a></div>
                    <div class="title">Portfolio</div>
                </div>
            </div>
        </div>
    </div>
    <!-- Projects -->
    <section class="projects section-padding">
        <div class="container">
            <div class="row">
                @foreach ($portfolio as $portfolios)
                <div class="col-md-4">
                    <div class="items mb-4">
                        <div class="con">
                            <div class="img">
                                <img src="{{ asset('upload/portfolio/'.$portfolios->image) }}" alt="">
                            </div>
                            <div class="info">
                                <h6><a href="javascript:void(0)">{{ $portfolios->title }}</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Lets Talk -->
   @include('partials.lettalk')
@endsection