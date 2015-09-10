<?php echo $this->element("admin_header"); ?>
<?php echo $this->element("admin_topright"); ?>
<?php echo $this->element("admin_nav"); ?>
<?php echo $this->element("admin_sidebar"); ?> 
<style>
.error-message{
color:red;
}


</style>
<script type="text/javascript">


function numbersonly(myfield, e, dec)

{

var key;

var keychar;



if (window.event)

key = window.event.keyCode;

else if (e)

key = e.which;

else

return true;

keychar = String.fromCharCode(key);



// control keys

if ((key==null) || (key==0) || (key==8) || 

(key==9) || (key==13) || (key==27) )

return true;



// numbers

else if ((("0123456789").indexOf(keychar) > -1))

return true;



// decimal point jump

else if (dec && (keychar == "."))

{

myfield.form.elements[dec].focus();

return false;

}

else

return false;

}
</script>
<!--------------------------->
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-screen"></span>Administrator Profile</span>
      
    </div>
     <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'admin_dashboard')); ?>">Dashboard</a></li>
                <li><a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'admin_profile')); ?>">Administrator Profile</a></li>
                 <li class="current"><a href="javascript:void:(0)">Edit Administrator Profile</a></li>
            </ul>
        </div>
    </div>
    
    <!-- Main content -->
    <div class="wrapper">
    <?php $x=$this->Session->flash();if($x){ ?>
    <div class="nNote nSuccess" id="flash">
       <div class="alert alert-success" style="text-align:center" ><?php echo $x; ?></div>
     </div><?php } ?>
    	<!-- Chart -->
     <div class="widget fluid">
        <div class="whead"><h6>Edit Profile</h6></div>
        <div id="dyn" class="hiddenpars">
             <?php echo $this->Form->create('User',array('action'=>'admin_profileedit','type'=>'file','id'=>'validate')); ?>
                <div class="formRow">
                    <div class="grid3"><label>Username:</label></div>
                    <div class="grid9">
                    <?php echo $this->Form->input('username', array('label'=>"",'type'=>'text','value'=>$profile['User']['username'],"readonly"));?>
                    </div>
                </div>
                 <div class="formRow">
                    <div class="grid3"><label>First Name:</label></div>
                    <div class="grid9">
                    <?php echo $this->Form->input('first_name', array('label'=>"",'type'=>'text'));?>
                    </div>
                </div>
            
             <div class="formRow">
                    <div class="grid3"><label>Last Name:</label></div>
                    <div class="grid9">
                    <?php echo $this->Form->input('last_name', array('label'=>"",'type'=>'text'));?>
                    </div>
                </div>
                <div class="formRow">
                    <div class="grid3"><label>Email:</label></div>
                    <div class="grid9">
                    <?php echo $this->Form->input('email', array('label'=>"",'type'=>'email','value'=>$profile['User']['email']));?>
                    </div>
                </div>                
                   
                <div class="formRow">
                    <div class="grid3"><label>Profile Image:</label></div>
                    <div class="grid9">
                    <?php //echo $this->Form->input('profile_image', array('label'=>"",'type'=>'file','id'=>'fuPhoto','required')); ?>
					<input type="file" id="fuPhoto" name="data[User][profile_image]"  />
					
					<div style="float:right;margin-right: 330px;"><img src="<?php  if($userDetail['User']['profile_image'] !=''){echo $this->webroot."files/profileimage/".$userDetail['User']['profile_image']; } else { echo $this->webroot."img/admin.png"; }?>" class="user_img2"></div>
					
					<label id="myLabel" style="color:red;float:left;" />
					
                    </div>
                </div> 
                <div class="formRow">
                    <div class="grid3"><label>Contact No:</label></div>
                    <div class="grid9">
                    <?php echo $this->Form->input('contact', array('label'=>"",'type'=>'text','value'=>$profile['User']['contact'],'maxlength'=>'20','onkeypress'=>'return numbersonly(this, event)'));?>
                    </div>
                </div>               
                <div class="formRow">
                    <div class="grid3"><label></label></div>
                    <div class="save_but">
                    <button type="submit" name="Save" id="update" class="buttonS bLightBlue" >Save</button>
                    </div>
					<div class="grid2">
                    <a href="<?php echo $this->webroot; ?>admin/users/profile" class="buttonS bLightBlue" >Cancel</a>
                    </div>
                </div>
           </form>
     
        </div>  
          
        </div>        
    </div>
</div>
<script type="text/javascript">
   $(document).ready(function(){
       $('#validate').validate();
		$('#fuPhoto').change(
            function () {
				//get the file size and file type from file input field
      		 var fsize = $('#fuPhoto')[0].files[0].size;
                var fileExtension = ['jpeg', 'jpg','png','gif'];
                if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                    $('#myLabel').html("use .jpeg,.jpg,.png,.gif'and max. 2mb size.");
					$(":submit").attr("disabled", true);
				}
				else if(fsize>2097152){ 
					
					$('#myLabel').html("File must be less than 2MB");
					$(":submit").attr("disabled", true);
				
				}
								
				else if(fsize<=2097152){ 
					
					$('#myLabel').html(" ");
					$(":submit").removeAttr("disabled");
				
				}
                else {
                    $('#myLabel').html(" ");
					$(":submit").removeAttr("disabled");
                }
						
            });	
   });
   </script>
      
