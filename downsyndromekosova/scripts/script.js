
$(document).ready(function(){
    $('.slider').slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      speed: 1300,
      dots: true,
      autoplay: true,    
      autoplaySpeed: 2000,
       
        fade: true,
        cssEase: 'linear',

        responsive: [
          {
            breakpoint: 992, 
            settings: {
              slidesToShow: 1, 
            }
          },
          {
            breakpoint: 769, 
            settings: {
              slidesToShow: 1, 
            }
          },
          {
            breakpoint: 576, 
            settings: {
              slidesToShow: 1,            
            }
            
          }
        ]
    });
});