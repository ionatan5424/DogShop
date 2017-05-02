@extends('cms.cms_master')

@section('cms_content')
<h1 class="text-center page-header">Dashboard</h1>


<div id="myCarousel" class="carousel slide">

    <ol class="carousel-indicators">
        <li data-target ="#myCarousel" data-slide-to ="0" class="active"</li>
        <li data-target ="#myCarousel" data-slide-to ="1"</li>
        <li data-target ="#myCarousel" data-slide-to ="2"</li>
    </ol>

<div class="carousel-inner">
    
    <div class="item active">
        
        <img src="{{ asset('images/hunting-dog-1343956_960_720.jpg') }}" name="hunting_dog" alt="hunting dog" class="img-responsive">
        <div class="carousel-caption">
            <h2><span style="color: yellow;">Hunting Dog</span></h2>
            <span style="color: yellow;">fast as a car</span>
        </div>
    </div>
    
    <div class="item">
        
        <img src="{{ asset('images/chiwawaa.jpeg') }}" border="0" alt="chiwawa" name="chiwawa" class="img-responsive"/>
        <div class="carousel-caption">
            <h3 class="text-danger">Chiwawa</h3>
            <p class="text-danger">Smallest dog on the planet</p>
        </div>
        
    </div>
    <div class="item">
        
        <img src="{{ asset('images/golden.jpg') }}" border="0" alt="golden retriever" name="golden_retriever" class="img-responsive" />
        <div class="carousel-caption">
            <h3 class="text-primary">Golden Retriever</h3>
            <p class="text-primary">Ready to make your life easier</p>
        </div>
    </div>
  </div>
    
    <a class="carousel-control left" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    
     <a class="carousel-control right" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
    </a>
    
</div>


@endsection
