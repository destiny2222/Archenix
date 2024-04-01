@extends('layouts.main')
@section('content')
    <!-- Header Banner -->
    <div class="banner-header valign bg-img bg-fixed" data-overlay-dark="4" data-background="images/slider/2.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 caption mt-60">
                    <<div class="subtitle"><a href="/">Home</a></div>
                    <div class="title">Our Services</div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services -->
    <section class="services section-padding">
        <div class="container">
            <div class="row">
                @foreach ($service as $services)
                <div class="col-md-4 mb-5 animate-box" data-animate-effect="fadeInUp">
                    <div class="item" style="background-image:url({{ asset('upload/service/'.$services->image) }})">
                        <div class="con">
                            <h5>{{ $services->title }}</h5>
                            <p>{{ $services->description }}</p>
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