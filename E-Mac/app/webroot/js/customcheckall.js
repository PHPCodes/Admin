// JavaScript Document
$(document).ready(function(){
$('#titleCheck').live('click',function(){
	var checked = $(this).attr('checked')?true:false;
	/*if(checked==true){
		$('#uniform-titleCheck span').addClass('checked');
		}
		if(checked==false){
		$('#uniform-titleCheck span').removeClass('checked');
		}*/
    $('.checkAll').attr('checked',checked);
});
});
