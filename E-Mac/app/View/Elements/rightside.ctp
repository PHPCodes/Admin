 <div class="content-2">
		<span class="join">JOIN TODAY </span><br>
		<span class="safe">It's safe and Secure</span>
<?php
 echo $this->Form->create("User",array('controller'=>'Users','action'=>'add','id'=>'frmreg','class'=>"form")); 
 echo $this->Form->input('username',array("label" => "",'type'=>'text','class'=>"input",'placeholder'=>"What Is Your Username?"));
 echo $this->Form->input('email', array('label'=>"",'type'=>'email','class'=>"input",'placeholder'=>"What Is Your Email?"));
 echo $this->Form->input('password', array('label'=>"",'id'=>'pass','class'=>"input",'placeholder'=>"What Is Your Password?"));
 echo $this->Form->input('c_password', array('label'=>"",'type'=>'password','equalTo'=>'#pass','class'=>"input",'placeholder'=>"Re-Enter Your Password?"));        
 echo $this->Form->input('register_date',array("type" => "hidden","value" => date("Y-m-d"))); 
 echo $this->Form->input('status',array("type" => "hidden","value" =>"Pending")); ?> 		 
<div class="fileupErrordetection" style="color:red;"></div>
<div class="fileupSuccess" style="color:green;"></div>
	  <span class="joinbtn"><button type="submit" class="pad" style="background-color:transparent;border:0px;"><img src="img/ss_17.jpg"></button></span>
	</form>
	<?php echo $this->Html->script(array('jquery-1.7.1.min','jquery.form')); ?>
                        <script type="text/javascript">
                            $(document).ready(function(e){
                                $('#frmreg').ajaxForm({
                                    uploadProgress: function(event, position, total, percentComplete) {
                                        $('#upPRc').html('<img src="https://www.caritas.us/sites/default/files/images/misc/loading.gif"/>');
                                        
                                    },
                                    complete: function(xhr) {
                                        $('#upPRc').html('');
                                    },
                                    success: function(data){
                                        console.log(data);
                                        d = JSON.parse(data);
                                        console.log(d);
                                        if(d.error == 1){
                                            //$('.fileupError').html(d.message);
                                            $('.fileupErrordetection').html(d.message);
                                        }else if(d.error == 0){
                                            $('.fileupSuccess').html(d.message);
                                        }
                                    }
                                });
								
                            });
                        </script>
		<div class="sideedit">
		<table width="405" height="114px" border="0" cellpadding="0" cellspacing="0" >
  <tr>
    <td width="49"><img src="img/ss_29.jpg" width="31" height="31"></td>
    <td width="136">text text text </td>
    <td width="35"><img src="img/ss_31.jpg" width="30" height="31"></td>
    <td width="225">text text text </td>
  </tr>
  <tr>
    <td height="44"><img src="img/ss_37.jpg" width="45" height="44"></td>
    <td>text text text </td>
    <td><img src="img/ss_35.jpg" width="30" height="34"></td>
    <td>text text text </td>
  </tr>
</table>

		
		</div>
		</div>
		<div></div>
		</div>
    <div id="footer">
	    <div class="fo1"><p class="">&copy;2013- Academatch. Alright Reserved</p></div>
		<div class="fo2"></div>
	</div>
</div>