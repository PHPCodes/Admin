<div id="top">
	<div class="wrapper">
    	<?php //echo $this->Html->image('ss_44.png',array('style'=>'height:50px;width:200px;margin-left:-20px;')); ?>
        
        <!-- Right top nav -->
       <!-- <div class="topNav">
            <ul class="userNav">
                <li><a href="#" title="" class="screen"></a></li>
                <li><a href="#" title="" class="settings"></a></li>
                <li><a href="#" title="" class="logout"></a></li>
            </ul>
        </div>-->
    </div>
</div>
<!-- Top line ends -->

<script type="text/javascript">
		$(document).ready(function(){
			$('#flash').live('click',function(){
				$('#flash').fadeOut(3000);
				});
		
		
		   $('#loginForm').validate();
	
/*				// validate signup form on keyup and submit
$("form").validate({
    rules: {
        password: {
            required: true,
            minlength: 5
        },
        password_confirm: {
            required: true,
            minlength: 5,
            equalTo: "#password"
        }
    },
    messages: {
        password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long"
        },
        password_confirm: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long",
            equalTo: "Please enter the same password as above"
        }
    }
});*/
		
		
		
		});        
        </script>
        
<!-- Login wrapper begins -->
<div class="loginWrapper">

	<!-- Current user form -->
   <?php echo $this->Form->create('User',array('method'=>'post','id'=>'loginForm')); ?>
        <div class="loginPic">
           <!-- <a href="#" title=""><img src="../images/userLogin.png" alt="" /></a>-->
		<span><?php echo $this->Html->image(FULL_BASE_URL.$this->webroot.'files/'.$site['Sitesetting']['web_logo'],array('width'=>'100')); ?></span>
      <span>Reset Password</span>
         <?php $x=$this->Session->flash(); if($x){ ?>
          <div class="nNote nSuccess" id="flash">
              <div class="alert alert-success" style="text-align:center;color:red;" ><?php echo $x; ?></div>
          </div><?php } ?>
            <!--<div class="loginActions">
                <div><a href="#" title="Change user" class="logleft flip"></a></div>
                <div><a href="#" title="Forgot password?" class="logright"></a></div>
            </div>-->
        </div>
      <?php echo $this->Form->input('password',array("type"=>"password",'label' => false,'placeholder'=>"New Password..." ,'name'=>'data[User][password]','class'=>'loginPassword','id'=>'password','required')); ?>
         <?php echo $this->Form->input('password_confirm',array("type"=>"password",'label' => false,'placeholder'=>'Confirm Password...','class'=>'loginPassword','name'=>'data[User][password_confirm]','id'=>'password_confirm','required')); ?>
 
      
       <!-- <div class="logControl">--><div>
        <div style="float:left;margin-left:80px;">
        <input type="submit" name="submit" value="Save" style="margin-top:10px;" class="buttonM bBlue" /></div>
        
        </div>
		<div class="grid2" style="margin-top:10px;">
                               <a  href="<?php echo $this->webroot; ?>admin/users/login" class="buttonS bLightBlue" >Cancel</a>
                    </div>
    </form>
    
    
    <!-- New user form -->
   <!-- <form action="index.html" id="recover">
        <div class="loginPic">
            <a href="#" title=""><img src="images/userLogin2.png" alt="" /></a>
            <div class="loginActions">
                <div><a href="#" title="" class="logback flip"></a></div>
                <div><a href="#" title="Forgot password?" class="logright"></a></div>
            </div>
        </div>
            
        <input type="text" name="login" placeholder="Your username" class="loginUsername" />
        <input type="password" name="password" placeholder="Password" class="loginPassword" />
        
        <div class="logControl">
            <div class="memory"><input type="checkbox" checked="checked" class="check" id="remember2" /><label for="remember2">Remember me</label></div>
            <input type="submit" name="submit" value="Login" class="buttonM bBlue" />
        </div>
    </form>-->

</div>