// JavaScript Document

 $(document).ready(function(){
                    
                    $('.bxslider1').bxSlider({
					mode: 'fade',
					captions: true
					});
                    });
					
					
$(document).ready(function(){
                    $('.bxslider').bxSlider({
					minSlides:0,
					maxSlides:6,
					slideWidth:828,
					slideMargin:0,
					 moveSlides: 1
					});
                    });
$(document).ready(function(){
                    $('.bxslider2').bxSlider({
					minSlides:0,
					maxSlides:6,
					slideWidth:545,
					slideMargin:0,
					 moveSlides: 1
					});
                    });
$(document).ready(function(){
                    $('.bxslider3').bxSlider({
					minSlides:0,
					maxSlides:6,
					slideWidth:264,
					slideMargin:0,
					 moveSlides: 1
					});
                    });
					
 $(document).ready(function(){
 
        $(window).scroll(function(){
            if ($(this).scrollTop() > 100) {
                $('.scrollup').fadeIn();
            } else {
                $('.scrollup').fadeOut();
            }
        });
 
        $('.scrollup').click(function(){
            $("html, body").animate({ scrollTop: 0 }, 600);
            return false;
        });
 
    });
	