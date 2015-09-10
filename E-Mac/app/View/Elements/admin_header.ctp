<?php  echo ""; ?>
<div id="top">
    <div class="wrapper">
        <a href="<?php echo FULL_BASE_URL.$this->webroot; ?>admin/users/dashboard" title="<?php echo $site['Sitesetting']['title']; ?>" class="logo">
        <span style="">
 <span style="font-size:20px;color:white;"><b><?php echo $site['Sitesetting']['title']; ?></b></span>
 </span>
    
     </a>
        <script type="text/javascript">
		$(document).ready(function(){
			$('#flash').live('click',function(){
				$('#flash').fadeOut(3000);
				});
		});        
        </script>
        <script type="text/javascript">
$(function(){
$(".tool-tip").tipTip({defaultPosition:'tip_right_bottom'});
});
</script>
