<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo"><a href="index.html">Sailor</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">

        <ul>
          <li class="active"><a href="{{url('/')}}">Home</a></li>

          <li class="drop-down"><a href="#">About</a>
            <ul>
              <li><a href="{{url('about-us')}}">About Us</a></li>
              <li><a href="team.html">Team</a></li>
              <li><a href="testimonials.html">Testimonials</a></li>

              <li class="drop-down"><a href="#">Deep Drop Down</a>
                <ul>
                  @foreach ($arrs as $item)
                    <li><a href="#">{{$item}}</a></li>
                  @endforeach
                </ul>
              </li>
              <li class="drop-down"><a href="#">Companies</a>
                <ul>
                @foreach ($companies as $key => $item)
                    <li><a href="#">{{$item['name']}}</a></li>
                @endforeach


                </ul>
              </li>
            </ul>
          </li>

          <li><a href="services.html">Services</a></li>
          <li><a href="portfolio.html">Portfolio</a></li>
          <li><a href="pricing.html">Pricing</a></li>
          <li><a href="blog.html">Blog</a></li>
          <li><a href="contact.html">Contact</a></li>

        </ul>

      </nav><!-- .nav-menu -->

      <a href="index.html" class="get-started-btn ml-auto">Get Started</a>
      @auth
      <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="get-started-btn ml-auto">{{Auth::user()->name}}</a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
      @endauth
      @guest
      <a href="{{route('login')}}" class="get-started-btn ml-auto">Login</a>
      <a href="{{route('register')}}" class="get-started-btn ml-auto">Register</a>
      @endguest

    </div>
  </header>
