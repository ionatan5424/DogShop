  $(document).ready(function () {

$('input.search').keyup(function () {
         
    var userText = $.trim( $(this).val() );
 
    if (userText.length > 0) {
      $.ajax({
        url: BASE_URL + 'content/json',
        type: "GET",
        dataType: "json",
        data: {search: userText},
        success: function (response) {
          if (response) {           
            
            var autoList = '<ul>';
            $.each(response, function (key, val) {
              var title = val.title.toLowerCase();
              var textBySearch = userText.toLowerCase();
              if(title.match( textBySearch )){
                autoList += '<li><a href="' + BASE_URL + 'shop/' + val.catUrl + '/' + val.url + '">'+val.title+'</a></li>';
              }
            });
 
            autoList += '</ul>';
            $('div.search-result').html(autoList).fadeIn(200);
 
          } else {
             
            $('div.search-result').fadeOut(200);
             
          }
 
        }
      });
 
    } else {
       
      $('div.search-result').fadeOut(200);
       
    }
 
  });
   
  $('input.search').focusout(function(){
    if(!$('div.search-result').is(":hover")){
      $('div.search-result').fadeOut(200);
    }
  });

  $('input.search').focusout(function(){
    if(!$('div.search-result').is(":hover")){
      $('div.search-result').fadeOut(200);
    }
  });


  $('#summernote').summernote({
    height: 300,
  });

$('.my-source-field').on('keyup', function(){
  var sr = $(this).val();
  sr = sr.trim();
  sr = sr.toLowerCase();
  sr = sr.replace(/\s/g, '-') //reg expression /s= when you see space, g stands for global
   $('.my-target-field').val(sr);
});

$('.sm-box').delay(3000).slideUp()

$('.add-to-cart-btn').on('click', function(){

  $.ajax({
    url: BASE_URL + 'shop/add-to-cart',
    type: "GET",
    dataType: "html",
    data: { acquire_id: $(this).data('id') },
    success: function (response) {
      location.reload();
    }
  });

});

  $('.update-cart').on('click',function(){

    $.ajax({
      url: BASE_URL + 'shop/update-cart',
      type: "GET",
      dataType: "html",
      data: { op: $(this).data('op'), id:$(this).data('id') },
      success: function (response) {
         location.reload();
      }
    });

  });
  
var ascending = '';
$('#asc').on('click', function(){
    ascending = true;
    $grid.isotope({
      sortBy: 'number',
      sortAscending: ascending
    });
  });
  
  $('#desc').on('click', function(){
    ascending = false;
    $grid.isotope({
      sortBy: 'number',
      sortAscending: ascending
    });
  });
  
  var $grid = $('.grid').isotope({
    layoutMode: 'fitRows',
  getSortData: {
    number: '.number parseInt'
  },
  // sort by color then number
  sortBy: [ 'number' ]
});

$('href=#top').on('click', function()
{
    $('html, footer').animate({scrollTop:0}, 'slow');
    return false;
});


  });
