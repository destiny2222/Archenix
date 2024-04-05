@extends('layouts.main')
@section('content')
        <!-- Header Banner -->
        <div class="banner-header valign bg-img bg-fixed" data-overlay-dark="4" data-background="images/slider/2.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 caption mt-60">
                        <div class="subtitle"><a href="/">Home</a></div>
                        <div class="title"> Sitemap </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About -->
        <section class="section-padding">
            <div class="container">
                <div class="row mb-5 animate-box" data-animate-effect="fadeInUp">
                    <div class="col-md-12">
                        {!!  html_entity_decode(getSetting()->sitemap ?? '')  !!}
                    </div>
                </div>
            </div>
        </section>

          <!-- Lets-Talk -->
   @include('partials.lettalk')
@endsection