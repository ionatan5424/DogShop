@extends('master')

@section('content')

<figure class="uk-overlay uk-overlay-hover">
    
  <img src="{{ asset('images/dog-listening.jpg') }}" name="dog" alt="Responsive image" id="about-dog">
  <img class="uk-overlay-panel uk-overlay-image">
  
    <figcaption class="uk-overlay-panel uk-overlay-slide-top">
      <div class="text-center">
          <h1 style="margin-top: 150px;"class="text-center">Oopps... <br><br> Page not found.</h1>
        <p class="text-center">Rated #1 DEMO SITE by the Dog Kennel Association</p>
    </div>
    </figcaption>
  
</figure>
<hr class="vertical"/>
</body>
@endsection

