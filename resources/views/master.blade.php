<!DOCTYPE html>
<html>
  <head>
      <title>
          @if(isset($title))
          {{ $title }}
          @else
          @endif
      </title>
    <script> var BASE_URL = "{{ url('') }}/";</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('inc.header')
  </head>
</head>
<body>
  
  
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ url('') }}">
          <div class='logoDiv'></div>
        </a>
      </div>

      <div id="navbar" class="navbar-collapse collapse">

        <ul class="nav navbar-nav">
          
          @if(isset($menu) && $menu)
            @foreach($menu as $item)
            <li><a href="{{ url($item['url']) }}">{{ $item['link'] }}</a></li>
            @endforeach
          @endif
          
          <li><a href="{{ url('shop') }}">Shop</a></li>
          @if( $total_cart = Cart::getTotalQuantity() )
          
    
          <li>
            <a href="{{ url('shop/checkout') }}">
               <img border="0" width="20" src="{{ asset('images/dognman.png') }}"/>
               <div class="total-cart">{{ $total_cart }}</div>
          </a>
          </li>
          @endif
          <!--Search field -->
          <div class="search-input-wrapper">
          <form action="" method="get" autocomplete="off">
            <input type="text" name="search" class="search" placeholder="Search...">
          </form>
          <div class="search-result" style="color:#fff;"></div>
          
<!--      <h3>...</h3
      <p>..</p>-->
      <div class="product-result">
      </div>
          </div>
           <!--End of Search field-->
           
        </ul>
        <ul class="nav navbar-nav pull-right">
          @if( !Session::has('user_id'))
          <li class="boo"><a href="{{ url('user/signin') }}">Sign in</a></li>
          <li class="boo1"><a href="{{ url('user/signup') }}">Sign up</a></li>
          @else
          <li><a style="padding: 15px 0px 10px;" href="{{ url('user/profile') }}">Welcome, {{ Session::get('user_name') }}</a></li>
          @if(Session::has('is_admin'))
          <li><a href="{{ url('cms/dashboard') }}">CMS DASHBOARD</a></li>
          @endif
          <li><a href="{{ url('user/logout') }}">Logout</a></li>
          @endif
        </ul>
      </div><!--/nav.collapse -->
    </div>
  </nav>
  <br><br>
<!--  TODO: Need to test outer container style effects-->
  <div class="container">
    @if(isset($errors) && $errors->any()) @include('inc.errors') @endif
    @if( Session::has('sm') ) @include('inc.sm'){{-- include always starts at 'VIEW' --}} @endif
    @yield('content')
  </div>

  <hr>


  <!-- FOOTER -->
  <div class="container" id="#top">
    <div class="row">
      <div class="col-md-12">
        <footer>
          <p class="pull-right"><a href="#top">Back to top</a></p>
          <div class='logoDiv'>&copy; DogShop Inc. {{ date('Y') }}</div>
        </footer>
      </div>
    </div>
  </div>
  <!-- ENDFOOTER -->
  @include('inc.footer')
</body>
</html>

