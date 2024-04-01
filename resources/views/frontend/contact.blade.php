@extends('layouts.main')
@section('content')
    <!-- Header Banner -->
    <div class="banner-header valign bg-img bg-fixed" data-overlay-dark="4" data-background="images/slider/2.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 caption mt-60">
                    <div class="subtitle"><a href="/">Home</a></div>
                    <div class="title">Contact</div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact -->
    <div class="contact section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <!-- Contact Info -->
                    <h4 class="mb-4">Get in  <span>touch</span></h4>
                    <p>{{  getSocial()->address ?? '' }}</p>
                    <div class="phone">{{  getSocial()->phone ?? '' }}</div>
                    <div class="mail">{{  getSocial()->email ?? '' }}</div>
                    <div class="social mt-2"> 
                        <a href="{{  getSocial()->facebook ?? '' }}"><i class="ti-facebook"></i></a> 
                        <a href="{{  getSocial()->twitter ?? '' }}"><i class="ti-twitter"></i></a> 
                        <a href="{{  getSocial()->instagram ?? '' }}"><i class="ti-instagram"></i></a> 
                        <a href="{{  getSocial()->linkedin ?? '' }}"><i class="ti-linkedin"></i></a>  
                    </div>
                </div>
                <!-- form -->
                <div class="col-md-6">
                    <h4 class="mb-4">Have a Project? - <span>Lets Talk</span></h4>
                    <form method="post" class="" action="{{ route('contact.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <input name="name" type="text" placeholder="Your Name *" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <input name="email" type="email" placeholder="Your Email *" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <input name="phone" type="text" placeholder="Your Number *" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <input name="subject" type="text" placeholder="Subject *" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <textarea name="message" id="message" cols="30" rows="4" placeholder="Message *" required></textarea>
                            </div>
                            <div class="col-md-12 mt-2">
                                <input name="submit" type="submit" value="Send Message">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Lets Talk -->
@endsection