@extends('layouts.main')
@section('content')
    
        <!-- Slider -->
        <header id="slider-area" class="header slider-fade">
            <div class="owl-carousel owl-theme">
                <!-- The opacity on the image is made with "data-overlay-dark="number". You can change it using the numbers 0-9. -->
                @foreach ($slide as $slides)
                    <div class="text-left item bg-img" data-overlay-dark="4" data-background="{{ asset('upload/slider/'.$slides->image) }}">
                        <div class="v-middle caption">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-7">
                                        <h1>{{ $slides->title }}</h1>
                                        <p>{{ $slides->description }}</p> 
                                        {{-- <a href="{{ $slides->link }}" class="button-light">Learn more</a>  --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- <div class="slide-num" id="snh-1"></div>
            <div class="slider__progress"><span></span></div> --}}
        </header>
        <!-- About -->

        {{-- <section class="about section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 animate-box text-center" data-animate-effect="fadeInUp">
                        <div class="section-title"><span>Welcome to </span> {{ getWelcome() ? getWelcome()->title : '' }}</div>
                        <p>
                            {{ getWelcome() ? getWelcome()->description : '' }}
                        </p>
                    </div>
                </div>
            </div>
        </section> --}}

        <!-- About -->
        <section id="aboutus" class="about section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 animate-box text-lg-center mb-5" data-animate-effect="fadeInUp">
                        <div class="section-title">{{ getUi() ? getUi()->title : '' }}</div>
                        <p>
                            {!! html_entity_decode(getUi() ? getUi()->body : '')  !!}
                        </p>
                    </div>
                    <div class="col-12 col-md-6 animate-box mb-4" data-animate-effect="fadeInUp">
                        <h2>Vision</h2>
                        <p>{{ getUi() ? getUi()->vision : '' }}</p>
                    </div>
                    <div class="col-12 col-md-6 animate-box mb-4" data-animate-effect="fadeInUp">
                        <h2>Mission</h2>
                        <p>{{ getUi() ? getUi()->mission : '' }}</p>
                    </div>
                    
                    
                </div>
            </div>
        </section>


        <!-- Projects 2 -->
        <section  id="portfolio"  class="projects3 section-padding">
            <div class="container">
                <div class="row mb-5">
                    {{-- <div class="col-md-4 animate-box" data-animate-effect="fadeInUp">
                        <div class="sub-title border-bot-light">Discover</div>
                    </div> --}}
                    <div class="col-md-12 animate-box" data-animate-effect="fadeInUp">
                        <div class="section-title"><span>Our</span> Portfolio</div>
                        {{-- <p>Architecture viverra tristique justo duis vitae diaminte neque nivamus aestan ateuene artines ariianu the ateliten finibus viverra nec lacus in the nedana mis erodino. Design nila iman the finise viverra nec a lacus miss viventa in the setlien suscipe no curabit tristue the seneoice misuscipit non sagie the fermen.</p> --}}
                    </div>
                </div>
                @forelse (getPortfolio() as $key => $portfolio)
                    @if ($key % 2 == 0)
                        <div class="row mt-120">
                            <div class="col-md-8 animate-box" data-animate-effect="fadeInUp">
                                <div class="img">
                                    <a href="javascript:void()"><img src="{{ asset('upload/portfolio/'.$portfolio->image) }}" alt=""></a>
                                </div>
                            </div>
                            <div class="col-md-4 valign animate-box" data-animate-effect="fadeInUp">
                                <div class="content">
                                    <div class="cont">
                                        <h3>{{ $portfolio->title }}</h3>
                                        <div class="more"><a href="javascript:void()" class="link-btn" tabindex="0">View Project</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row mt-120">
                            <div class="col-md-4 valign animate-box" data-animate-effect="fadeInUp">
                                <div class="content">
                                    <div class="cont">
                                        <h3>{{ $portfolio->title }}</h3>
                                        <div class="more"><a href="javascript:void()" class="link-btn" tabindex="0">View Project</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 animate-box" data-animate-effect="fadeInUp">
                                <div class="img">
                                    <a href="javascript:void()"><img src="{{ asset('upload/portfolio/'.$portfolio->image) }}" alt=""></a>
                                </div>
                            </div>
                        </div>
                    @endif

                @empty
                @endforelse
            </div>
        </section>

        <!-- Services -->
        {{-- <section id="service" class="services section-padding">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md-12 animate-box" data-animate-effect="fadeInUp">
                        <div class="section-title"><span>Our</span> Service</div>
                    </div>
                </div>
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
        </section> --}}

        <!-- sector -->
        <!-- Services -->
        <section id="sector" class="services section-padding">
            <div class="container">
                {{-- <div class="row mb-5">
                    <div class="col-md-12 animate-box" data-animate-effect="fadeInUp">
                        <div class="section-title"><span>Our</span> Sectors</div>
                    </div>
                </div> --}}
                <div class="row">
                    @foreach ($sector as $sectors)
                        <div class="col-md-4 mb-5 animate-box" data-animate-effect="fadeInUp">
                            {{-- <div class="item sector" style="background-image:url({{ asset('upload/sector/'.$sectors->image) }})"> --}}
                            <div class="item sector">
                                <div class="con ">
                                    <a href="javascript:void()">
                                        @if ($sectors->id < 10)
                                            <div class="numb">0{{ $sectors->id }}</div>
                                        @else
                                            <div class="numb">{{ $sectors->id }}</div>
                                        @endif
                                        <h5>{{ $sectors->title }}</h5>
                                        <p>{{ $sectors->description }}</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

    <!-- Blog -->
    {{-- <section class="blog-home section-padding">
        <div class="container">
        <div class="row mb-5">
                <div class="col-md-4">
                    <div class="sub-title border-bot-light">Blog</div>
                </div>
                <div class="col-md-8">
                    <div class="section-title"><span>Latest</span> News</div>
                </div>
            </div>
        <div class="row">
            @foreach ($blog as $blogs)
                <div class="col-md-4">
                    <div class="item">
                        <div class="post-img">
                            <a href="{{ route('blog.detail', $blogs->slug) }}">
                                <div class="img"> 
                                    <img src="{{ asset('upload/blog/'.$blogs->image) }}" alt=""> 
                                </div>
                            </a>
                        </div>
                        <div class="cont">
                            <h4><a href="{{ route('blog.detail', $blogs->slug) }}">{{ $blogs->title }}</a></h4>
                            <div class="info">
                                <a href="{{ route('blog.detail', $blogs->slug) }}"><span>{{ $blogs->category->title }}</span></a> 
                                <a href="{{ route('blog.detail', $blogs->slug) }}">{{ $blogs->created_at->format('d M Y') }}</a> 
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </section> --}}
        
        <!-- Testiominals -->
        {{-- <section class="testimonials">
            <div class="background bg-img bg-fixed section-padding" data-background="images/slider/4.jpg" data-overlay-dark="6">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 mb-30">
                            <h3 class="sub-title border-bot-dark">Testiominals</h3>
                        </div>
                        <div class="col-md-8">
                            <div class="section-title">What Client's Say?</div>
                            <div class="wrap">
                                <div class="owl-carousel owl-theme">
                                    <div class="item"> <span class="quote"><img src="images/quot.png" alt=""></span>
                                        <p>Architecture viverra tristique justo duis vitae diam neque nivamus aestan ateuene artines aringianu the ateliten finibus viverra nec lacus. Nedana theme erodino setlie suscipe no curabit tristique. Design nila iman the finise viverra nec a lacus themo the seneoice misuscipit non sagie the fermen.</p>
                                        <div class="info">
                                            <div class="author-img"> <img src="images/team/1.jpg" alt=""> </div>
                                            <div class="cont">
                                                <h6>Jason Brown</h6> <span>Crowne Plaza Owner</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item"> <span class="quote">
                                            <img src="images/quot.png" alt="">
                                        </span>
                                        <p>Architecture viverra tristique justo duis vitae diam neque nivamus aestan ateuene artines aringianu the ateliten finibus viverra nec lacus. Nedana theme erodino setlie suscipe no curabit tristique. Design nila iman the finise viverra nec a lacus themo the seneoice misuscipit non sagie the fermen.</p>
                                        <div class="info">
                                            <div class="author-img"> <img src="images/team/2.jpg" alt=""> </div>
                                            <div class="cont">
                                                <h6>Emily White</h6> <span>Armada Owner</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item"> <span class="quote">
                                            <img src="images/quot.png" alt="">
                                        </span>
                                        <p>Architecture viverra tristique justo duis vitae diam neque nivamus aestan ateuene artines aringianu the ateliten finibus viverra nec lacus. Nedana theme erodino setlie suscipe no curabit tristique. Design nila iman the finise viverra nec a lacus themo the seneoice misuscipit non sagie the fermen.</p>
                                        <div class="info">
                                            <div class="author-img"> <img src="images/team/4.jpg" alt=""> </div>
                                            <div class="cont">
                                                <h6>Jesica Smith</h6> <span>Alsa Manager</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        <!-- Lets Talk -->
        @include('partials.lettalk')
        
@endsection