 <div id="top">
	<div class="wrapper">
    	<?php //echo $this->Html->image('http://au3.engine.flamingtext.com/netfu/tmp28025/coollogo_com-261971621.png',array('style'=>'height:50px;width:200px;margin-left:-20px;')); ?>
		</div>
</div>
<script type="text/javascript">
		$(document).ready(function(){
			$('#flash').live('click',function(){
				$('#flash').fadeOut(3000);
				});
		});        
        </script>
        <div class="loginWrapper">
        <?php echo $this->Form->create('User',array('method'=>'post','action'=>'admin_forget','id'=>'validate')); ?>
        <div class="loginPic">
           <!-- <a href="#" title=""><img src="../images/userLogin.png" alt="" /></a>-->
		   <span><img src="<?php echo $this->webroot.'assets/img/login-logo.png'; ?>" alt="Logo"></span>
      <span class="forgot_margin">Forgot Password</span>
         <?php $x=$this->Session->flash(); if($x){ ?>
          <div class="nNote nSuccess" id="flash">
              <div class="alert alert-success" style="text-align:center;color:red;" ><?php echo $x; ?></div>
          </div><?php } ?>
            <!--<div class="loginActions">
                <div><a href="#" title="Change user" class="logleft flip"></a></div>
                <div><a href="#" title="Forgot password?" class="logright"></a></div>
            </div>-->
        </div>
        <?php //echo $this->Form->input('username',array('label'=>"",'placeholder'=>'Email id...','class'=>'loginEmail','type'=>'text')); ?>
        <?php echo $this->Form->input('email',array('label'=>false,'placeholder'=>"Enter Your Email..." ,'class'=>'loginEmail','type'=>'email','required'));?>
        <div class="logControl">
        <div style="float:right;">
        <input type="submit" name="submit" value="Find Password" class="buttonM bBlue" /></div>
      
     <!-- <div style="float:left;;">
       <a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'admin_login')); ?>">Back</a</div>
      </div>-->
      <div class="grid2" style="float:left;">
                    <a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'admin_login')); ?>" class="buttonM fBlue" >Cancel</a>
                    </div>
      </div>
		  </div>
    </form>
    </div>

  <script type="text/javascript">
   $(document).ready(function(){
       $('#validate').validate();
   });
</script>
