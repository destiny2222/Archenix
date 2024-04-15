<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            @if($brand = getBrands())
            <a class="header-brand1" href="{{ route('admin.home') }}">
                <img src="{{ asset('upload/brand/'.getBrands()->image) }}" class="header-brand-img desktop-logo" width="65" height="65" alt="logo">
                <img src="{{ asset('upload/brand/'.getBrands()->image) }}" class="header-brand-img toggle-logo"
                    alt="logo" width="65" height="65">
                <img src="{{ asset('upload/brand/'.getBrands()->image) }}" class="header-brand-img light-logo" width="65" height="65" alt="logo">
                <img src="{{ asset('upload/brand/'.getBrands()->image) }}" class="header-brand-img light-logo1" width="65" height="65"
                    alt="logo">
            </a>
            @endif
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg"
                    fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            <ul class="side-menu">
                <li class="sub-category">
                    <h3>Main</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('admin.home') }}"><i
                            class="side-menu__icon fe fe-home"></i><span
                            class="side-menu__label">Dashboard</span></a>
                </li>
                <li class="sub-category">
                    <h3>Pre-build Pages</h3>
                </li>
               
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                        class="side-menu__icon fe fe-folder"></i><span
                            class="side-menu__label">Home page</span><i
                            class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side13">
                                        <ul class="sidemenu-list">
                                            <li class="sub-slide">
                                                <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                                                    class="sub-side-menu__label">Slides</span><i
                                                    class="sub-angle fe fe-chevron-right"></i>
                                                </a>
                                                <ul class="sub-slide-menu">
                                                    <li><a class="sub-slide-item" href="{{ route('admin.slides.home') }}">Slider</a></li>
                                                    <li><a class="sub-slide-item" href="{{ route('admin.slide.create') }}">Create Slider</a></li>
                                                </ul>
                                            </li>
                                            {{-- <li><a href="{{ route('admin.welcome.home') }}" class="slide-item">About Brand</a></li> --}}
                                            <li><a href="{{ route('admin.sector.home') }}" class="slide-item">Sector</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                        class="side-menu__icon fe fe-folder"></i><span
                            class="side-menu__label">About Section</span><i
                            class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side13">
                                        <ul class="sidemenu-list">
                                            <li><a href="{{ route('admin.about.home') }}" class="slide-item">About Us</a></li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                {{-- <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                        class="side-menu__icon fe fe-folder"></i><span
                            class="side-menu__label">Post Section</span><i
                            class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side13">
                                        <ul class="sidemenu-list">
                                            <li><a href="{{ route('admin.category.home') }}" class="slide-item">Category</a></li>
                                            <li><a href="{{ route('admin.blog.home') }}" class="slide-item">Blog</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li> --}}
                {{-- <li class="slide">
                    <a class="side-menu__item" href="{{ route('admin.review.home') }}">
                        <i class="side-menu__icon fe fe-layers"></i>
                        <span class="side-menu__label">Review</span>
                    </a>
                </li> --}}
                <li class="slide">
                    <a class="side-menu__item" href="{{ route('admin.service.home') }}">
                        <i class="side-menu__icon fe fe-layers"></i>
                        <span class="side-menu__label">Services</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item" href="{{ route('admin.portfolio.home') }}">
                        <i class="side-menu__icon fe fe-layers"></i>
                        <span class="side-menu__label">Portfolio</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                        class="side-menu__icon fe fe-folder"></i><span
                            class="side-menu__label">SEO Setting</span><i
                            class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side13">
                                        <ul class="sidemenu-list">
                                            <li><a href="{{ route('admin.brand.home') }}" class="slide-item">Brand</a></li>
                                            <li><a href="{{ route('admin.setting.home') }}" class="slide-item">Setting</a></li>
                                            <li><a href="{{ route('admin.metaTag.home') }}" class="slide-item">MetaTag</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                        class="side-menu__icon fe fe-folder"></i><span
                            class="side-menu__label">Contact Section</span><i
                            class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side13">
                                        <ul class="sidemenu-list">
                                            <li><a href="{{ route('admin.social.home') }}" class="slide-item">Contact info</a></li>
                                            <li><a href="{{ route('admin.inbox.home') }}" class="slide-item">Email Inbox</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg></div>
        </div>
    </div>
</div>