$(document).ready(function () {
      $('input[type="text"],input[type="password"], textarea').focus(function () {
        defaultText = $(this).val();
         $(this).val('')
   
   
     });
    $('input[type="text"],input[type="password"], textarea').blur(function () {
        if ($(this).val() == "") {
            $(this).val(defaultText)

        }
    });
	
	
	
	$('.bxslider').bxSlider({
  		auto: false,
  		autoControls: true
	});
	

	$('.bxslider1').bxSlider({
  		auto: true,
  		autoControls: true
	});
	
});		
