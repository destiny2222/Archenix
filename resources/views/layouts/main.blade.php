<!DOCTYPE html>
<html lang="xyz">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ getSetting() ? getSetting()->metatag_des : '' }}">
    <meta name="keywords" content="{{ getSetting() ? getSetting()->metatag_keyword : '' }}">
    <link rel="shortcut icon" type="image/x-icon" href="https://archenix.blueheightconsult.com/upload/brand/images/favicon.png">
    <meta property="og:image" content="https://archenix.blueheightconsult.com/upload/brand/images/favicon.png" />
    <!-- Output Meta Tags -->
    @foreach(metaTags() as $metaTag)
        <meta name="{{ $metaTag->name }}" content="{{ $metaTag->content }}">
    @endforeach
    <link rel="icon" type="image/png" href="/images/favicon.png" />
        <title>{{ config('app.name') }}</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,300;0,400;1,300;1,400&amp;family=Oswald:wght@300;400&amp;display=swap">
        <link rel=stylesheet href="/css/bootstrap.min.css">
        <link rel=stylesheet href="/css/animate.css">
        <link rel=stylesheet href="/css/themify-icons.css">
        <link rel=stylesheet href="/css/owl.carousel.min.css">
        <link rel=stylesheet href="/css/owl.theme.default.min.css">
        <link rel=stylesheet href="/modules/magnific-popup/magnific-popup.css">
        <link rel=stylesheet href="/modules/YouTubePopUp/YouTubePopUp.css">
        <link rel=stylesheet href="/css/style.css">
   <script src=" {{ getSetting()->google_analytics ?? '' }}"></script>
   <script>
       {{ getSetting()->analysis_trackingid ?? '' }}
   </script>
   
</head>
<body>
    <div class="content-wrapper">
        <!-- Preloader -->
        <div class="preloader-bg"></div>
        <div id="preloader">
            <div id="preloader-status">
                <div class="preloader-position loader"> <span></span> </div>
            </div>
        </div>
        <!-- Progress scroll totop -->
        <div class="progress-wrap cursor-pointer">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>
        <!-- Lines -->
        <div class="content-lines-wrapper">
            <div class="content-lines-inner">
                <div class="content-lines"></div>
            </div>
        </div>
        
        <!-- Navbar -->
        @include('layouts.header')


        @yield('content')


    <!-- Footer -->
    <footer class="footer">
        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mb-30">
                        <div class="sub-title border-footer-light">Location</div>
                        <p>
                            {{  getSocial()->address ?? '' }}
                        </p>
                        <p>
                            {{  getSocial()->address_2 ?? '' }}
                        </p>
                        <p>
                            {{  getSocial()->address_3 ?? '' }}
                        </p>
                    </div>
                    <div class="col-md-4">
                        <div class="item">
                            <h3>Quick<span>  Link</span></h3>
                            <div class="footer-ul mt-2"> 
                                <ul class="p-0">
                                    <li><a href="#slider-area">Home</a></li>
                                    <li><a href="#aboutus">About</a></li>
                                    <li><a href="#service">Service</a></li>
                                    <li><a href="#portfolio">Portfolio</a></li>
                                    <li><a href="#contact">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="item">
                            <h3>Get in <span>Touch</span></h3>
                            <p>{{  getSocial()->address ?? '' }}</p>
                            <p class="phone">{{  getSocial()->phone ?? '' }}</p>
                            <p class="mail">{{  getSocial()->email ?? '' }}</p>
                            <div class="social mt-2"> 
                                <a href="{{  getSocial()->facebook ?? '' }}"><i class="ti-facebook"></i></a> 
                                <a href="{{  getSocial()->twitter ?? '' }}"><i class="ti-twitter"></i></a> 
                                <a href="{{  getSocial()->instagram ?? '' }}"><i class="ti-instagram"></i></a> 
                                <a href="{{  getSocial()->linkedin ?? '' }}"><i class="ti-linkedin"></i></a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <p>© <script>document.write(new Date().getFullYear())</script> {{ config('app.name') }}. All right reserved.</p>
                    </div>
                    <div class="col-md-8">
                        <p class="right"><a href="/terms">Terms &amp; Conditions</a></p>
                    </div>
                    
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- jQuery -->
<script src="/js/plugins/jquery-3.6.1.min.js"></script>
<script src="/js/plugins/bootstrap.min.js"></script>
<script src="/js/plugins/modernizr-2.6.2.min.js"></script>
<script src="/js/plugins/jquery.waypoints.min.js"></script>
<script src="/js/plugins/imagesloaded.pkgd.min.js"></script>
<script src="/js/plugins/jquery.isotope.v3.0.2.js"></script>
<script src="/js/plugins/owl.carousel.min.js"></script>
<script src="/js/plugins/scrollIt.min.js"></script>
<script src="/modules/magnific-popup/jquery.magnific-popup.js"></script>
<script src="/modules/masonry/masonry.pkgd.min.js"></script>
<script src="/modules/YouTubePopUp/YouTubePopUp.js"></script>
<script src="/js/script.js"></script>
@include('vendor.sweetalert.alert')
</body>
</html>