@extends('layouts.main')
@section('content')
    <!-- Header Banner -->
    <div class="banner-header valign bg-img bg-fixed" data-overlay-dark="4" data-background="images/slider/2.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 caption mt-60">
                    <div class="subtitle"><a href="/">Home</a></div>
                    <div class="title"> About Us </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About -->
    <section class="about section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-2 mb-30 animate-box" data-animate-effect="fadeInUp">
                    <div class="sub-title border-bot-light">About</div>
                </div>
                <div class="col-md-6 animate-box" data-animate-effect="fadeInUp">
                    <div class="section-title">{{ config('app.name') }}<span>About</span></div>
                    <p>
                        {{ getUi() ? getUi()->body : ''}}
                    </p>
                </div>
                <div class="col-md-4 animate-box" data-animate-effect="fadeInUp">
                    <div class="wrap">
                        <div class="con"> 
                            @if (getUi())
                             <img src="{{ asset('upload/About/'.getUi()->image) }}" class="img-fluid" alt="">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Lets-Talk -->
   @include('partials.lettalk')
@endsection