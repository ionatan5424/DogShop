<!DOCTYPE html>
<html>
  <head>
    <title>Dogshop Admin</title>
    <script> var BASE_URL = "{{ url('') }}/";</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('inc.header')
  </head>
</head>
<body>
  
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ url('cms/dashboard') }}">Dogshop Admin Panel</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a target="_blank" href="https://analytics.google.com/">Google Analytics</a></li>
            <li><a href="{{ url('') }}">Back to Site</a></li>
            <li><a href="{{ url('user/logout') }}">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          
          <ul class="nav nav-sidebar">
            <li><a href="{{ url('cms/dashboard') }}">Dashboard</a></li>
            <li><a href="{{ url('cms/menu') }}">Menu</a></li>
            <li><a href="{{ url('cms/content') }}">Content</a></li>
            <li><a href="{{ url('cms/categories') }}">Categories</a></li>
            <li><a href="{{ url('cms/products') }}">Products</a></li>
            <li><a href="{{ url('cms/orders') }}">Orders</a></li>
          </ul>
        </div>
        
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        @if($errors->any()) @include('inc.errors') @endif
        @if( Session::has('sm') ) @include('inc.sm') @endif
        @yield('cms_content')
            </div>
           </div> 
        <div class="row">
            <div class="col-xs-12">
                <ul class="uk-list uk-list-striped">
            <li><a href="{{ url('cms/dashboard') }}">Dashboard</a></li>
            <li><a href="{{ url('cms/menu') }}">Menu</a></li>
            <li><a href="{{ url('cms/content') }}">Content</a></li>
            <li><a href="{{ url('cms/categories') }}">Categories</a></li>
            <li><a href="{{ url('cms/products') }}">Products</a></li>
            <li><a href="{{ url('cms/orders') }}">Orders</a></li>
                </ul>                
            </div>
        </div>
         </div>    
      </div> 
            
 @include('inc.footer') 
</body>
</html>