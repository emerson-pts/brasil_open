$(document).ready(function(){
 
 
  $.ajax({
    url: '/destaques',
    type:'post',
    global: true,
    dataType: "json",
    cache: false,
    processData: false,
    contentType: false,
    beforeSend: function(){
     
     
   console.log('beforeSend');
    },
    success: function(data){
 

   Banner(data);
   SliderBanner(data);
   
 
    },
    error: function(){
 
   console.log('error');
 
    },
    complete: function(){
   // APENAS CALLBACK
    }
  });
  
  function Banner(data){

    for (var i = 0; i < data.length; i++) {
		
  
     var highlights_id = data[i].banner_id;
     var title = data[i].title;
     var background = data[i].background;
     var url = data[i].url;
     var type = data[i].type;
     var slug = data[i].slug;
     
  
     var html = '<div class="item" data-slide-number="' + highlights_id + '">';
     html += '<a href="' + url + '">';
     html += '<img src="/assets/upload/highlights/' + slug + '/' + background + '" class="img-responsive">';
     html += '</a>';
     html += '<div class="container">';
     html += '<div class="carousel-caption caption-0' + type + ' ">';
     html += '<img src="/assets/upload/highlights/' + slug + '/' + title + '">';
     html += '<a class="btn btn-primary" href="' + url + '">Clique aqui!</a>';
     html += '</div>';
     html += '</div>';
     html += '</div>';
  
     $("#banner").append(html);

	 data.length > 0 ? $('.item:eq(0)').addClass('active') : ' ';
		
    }
   }
   
   
   function SliderBanner(data){

    for (var i = 0; i < data.length; i++) {
		
  
     var highlights_id = data[i].banner_id;
     var title = data[i].title;
     var background = data[i].background;
     var url = data[i].url;
     var type = data[i].type;
     var slug = data[i].slug;
     
	 
  
     var html = '<ul class="list-inline">';
     html += '<li class="col-sm-2 box-content">';
     html += '<a id="carousel-selector-' + highlights_id + '">';
	 html += '<img src="/assets/upload/highlights/' + slug + '/' + background + '">';
     html += '</a>';
	 html += '</li>';
     html += '</ul>';
  
	 $("#slider-thumbs").append(html);
	 
	 
	 
	 
	 $('#myCarousel').carousel({
        interval: 4000
    });
    
    // handles the carousel thumbnails
    $('[id^=carousel-selector-]').click( function(){
      var id_selector = $(this).attr("id");
      var id = id_selector.substr(id_selector.length -1);
      id = parseInt(id);
      $('#myCarousel').carousel(id);
      $('[id^=carousel-selector-]').removeClass('selected');
      $(this).addClass('selected');
    });
	
	
    
    // when the carousel slides, auto update
    $('#myCarousel').on('slid', function (e) {
      var id = $('.item.active').data('slide-number');
      id = parseInt(id);
      $('[id^=carousel-selector-]').removeClass('selected');
      $('[id=carousel-selector-'+id+']').addClass('selected');
    });
	 
	 
	 
	 
	 

    }
   }






});


