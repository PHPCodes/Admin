<div id="top">
	<div class="wrapper">
    	<?php //echo $this->Html->image('logo2.png',array('style'=>'height:50px;width:200px;margin-left:-20px;')); ?>
        
    </div>
</div>
<!-- Top line ends -->

<script type="text/javascript">
		$(document).ready(function(){
			$('#flash').live('click',function(){
				$('#flash').fadeOut(3000);
				});
		});        
        </script>
        
<!-- Login wrapper begins -->
<!--<div style=" background: none repeat scroll 0 0 #C2C4C4;float: left; height: 723px; width: 100%;">-->
<div style="">
<div class="loginWrapper">

	<!-- Current user form -->
   <?php echo $this->Form->create('User',array('method'=>'post','id'=>'validate')); ?>
     <div class="loginPic">
        <span> <img src="<?php echo $this->webroot.'assets/img/login-logo.png'; ?>" alt="Logo"></span>
		<span><?php echo $site['Sitesetting']['title']; ?> Administrator</span>
       
        </div>
        <?php echo $this->Form->input('username',array('label'=>"",'placeholder'=>'Username','class'=>'loginEmail','type'=>'text','required')); ?>
         <?php echo $this->Form->password('password',array('label'=>"",'placeholder'=>'Password','class'=>'loginPassword','type'=>'password','required')); ?>
 
      <?php  $x=$this->Session->flash(); if($x){?>
	<div class="err_msg"><?php echo $x; ?></div>
	<?php } ?>
        <div class="logControl">
        <div style="float:left;">
        <input type="submit" name="submit" value="Login" class="buttonM bBlue" /></div>
        <div style="float: right;margin-left:21px;">
            
            <div>
            <a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'admin_forget')); ?>" class="buttonM bBlue" style="text-decoration: none;" >Forgot Password </a></div></div>
             </div>
       
    </form>
    

</div>
</div>
  <script type="text/javascript">
   $(document).ready(function(){
       $('#validate').validate();
   });
</script>
