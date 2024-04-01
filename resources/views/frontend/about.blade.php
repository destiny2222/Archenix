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
            <div class="row justify-content-center text-center">
                <div class="col-md-2 mb-30 animate-box" data-animate-effect="fadeInUp">
                    <div class="sub-title border-bot-light">{{ config('app.name') }}</div>
                </div>
                <div class="col-12 col-md-10 animate-box text-center mb-4" data-animate-effect="fadeInUp">
                    <div class="section-title">{{ getUi() ? getUi()->title : '' }}</div>
                    <p>
                        {{ getUi() ? getUi()->body : ''}}
                    </p>
                </div>
                <div class="col-md-2 mb-30 animate-box" data-animate-effect="fadeInUp"></div>
                <div class="col-12 col-md-4 animate-box mb-4" data-animate-effect="fadeInUp">
                    <h2>Mission</h2>
                    <p>{{ getUi() ? getUi()->mission : '' }}</p>
                </div>
                
                <div class="col-12 col-md-4 animate-box mb-4" data-animate-effect="fadeInUp">
                    <h2>Vision</h2>
                    <p>{{ getUi() ? getUi()->vision : '' }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Process -->
    <section class="process section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 animate-box mb-4" data-animate-effect="fadeInUp">
                    <h2>Our Sectors:</h2>
                </div>
                @foreach ($sector as $sectors)
                    <div class="col-12 col-md-4 valign animate-box" data-animate-effect="fadeInRight">
                        <div class="wrap">
                            <div class="cont">
                                <h3>{{ $sectors->title }}</h3>
                                <p>{{ $sectors->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Lets-Talk -->
   @include('partials.lettalk')
@endsection