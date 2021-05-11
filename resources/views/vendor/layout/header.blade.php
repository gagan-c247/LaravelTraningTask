<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>FlexStart Bootstrap Template - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @include('vendor.layout.style')
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="{{url('/')}}" class="logo d-flex align-items-center">
        <img src="{{asset('assets/img/logo.png')}}" alt="">
        <span>FlexStart</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          @if(url()->current() == url('/'))
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a href="{{route('blogs')}}">Blog</a></li>
          @endif
          @auth
            <li><a href="{{ url('/home') }}">Home2</a></li>
            <li class="dropdown"><a href="#"><span class="text-capitalize"> {{ Auth::user()->name }}</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="{{route('about.index')}}">About us</a></li>
                <li><a href="{{route('value.index')}}">values</a></li>
                <li><a href="#" style="pointer-events: none">counts</a></li>
                <li><a href="#" style="pointer-events: none">features</a></li>
                <li><a href="{{route('service.index')}}">Services</a></li>
                <li><a href="{{route('price.index')}}">pricing</a></li>
                <li><a href="{{route('faq.index')}}">FAQs</a></li>
                <li><a href="" style="pointer-events: none">portfolio</a></li>
                <li class="dropdown"><a href="#"><span>Testimonail</span> <i class="bi bi-chevron-right"></i></a>
                  <ul>
                    <li><a href="{{route('testimonial.create')}}">Add Testimonial</a></li>
                    <li><a href="{{route('testimonial.index')}}">All Testimonial</a></li>
                  </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Team</span> <i class="bi bi-chevron-right"></i></a>
                  <ul>
                    <li><a href="{{route('team.create')}}">Add Team Member</a></li>
                    <li><a href="{{route('team.index')}}">All Team Member</a></li>
                  </ul>
                </li>
                <li><a href="" style="pointer-events: none">our client</a></li>
                <li class="dropdown"><a href="#"><span>Blog</span> <i class="bi bi-chevron-right"></i></a>
                  <ul>
                    <li><a href="{{route('blog.create')}}">Add blog</a></li>
                    <li><a href="{{route('blog.index')}}">All blog</a></li>
                    <li><a href="{{route('category.index')}}">Category</a></li>
                  </ul>
                </li>
                <li><a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
              </ul>
            </li>
          @else
              <li><a href="{{ route('login') }}">Login</a></li>

              @if (Route::has('register'))
                  <li><a href="{{ route('register') }}">Register</a></li> 
              @endif
          @endauth
          
          @if(url()->current() == url('/'))
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="getstarted scrollto" href="#about">Get Started</a></li>
          @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  @if (url()->current() == url('/'))
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">We offer modern solutions for growing your business</h1>
                <h2 data-aos="fade-up" data-aos-delay="400">We are team of talented designers making websites with Bootstrap</h2>
                <div data-aos="fade-up" data-aos-delay="600">
                    <div class="text-center text-lg-start">
                    <a href="#about" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                        <span>Get Started</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                    </div>
                </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                <img src="assets/img/hero-img.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>
  @endif
    
  <!-- End Hero -->