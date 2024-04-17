<nav class="navbar navbar-expand-lg">
    <div class="container">
        <!-- Logo -->
        <div class="logo-wrapper">
            <a class="logo" href="/">
                @if (getBrands())
                 <img src="{{ asset('upload/brand/'.getBrands()->image) }}" class="logo-img normal-logo " alt="Logo">
                 <img src="{{ asset('upload/brand/'.getBrands()->image) }}" class="logo-img scrolled-logo " alt="Logo"> 
                 <img src="{{ asset('upload/brand/'.getBrands()->image) }}" class="mobile-logo"  alt="">
                 @endif
            </a>
            <!-- <a class="logo" href="/"> <h2>ArchSan <span>Architecture</span></h2> </a> -->
        </div>
        <!-- Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> 
            <span class="navbar-toggler-icon"><i class="ti-menu"></i></span> 
        </button>
        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"> 
                    <a class="nav-link active " href="#slider-area">Home</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#aboutus">About</a></li>
                {{-- <li class="nav-item"><a class="nav-link" href="#service">Services</a></li> --}}
                <li class="nav-item "> <a  class="nav-link " href="#portfolio">Portfolio </a></li>
                {{-- <li class="nav-item "> <a  class="nav-link " href="/blog">Blog </a></li> --}}
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
            </ul>
        </div>
    </div>
</nav> 

<script>
    // Get all the nav links
    const navLinks = document.querySelectorAll('.nav-link');

    // Loop through each nav link
    navLinks.forEach(link => {
        // Add click event listener
        link.addEventListener('click', function() {
            // Remove the "active" class from all nav links
            navLinks.forEach(navLink => {
                navLink.classList.remove('active');
            });

            // Add the "active" class to the clicked nav link
            this.classList.add('active');
        });
    });
</script>