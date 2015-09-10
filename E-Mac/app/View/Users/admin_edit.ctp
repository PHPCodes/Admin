<?php echo $this->element("admin_header"); ?>
<?php echo $this->element("admin_topright"); ?>
<?php echo $this->element("admin_nav"); ?>
<?php echo $this->element("admin_sidebar"); ?> 
<style type="text/css">
.grid2 a{text-decoration:none;}
.grid2 a : hover{text-decoration:none; color:white}
</style>
<!--------------------------->
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-screen"></span>User Management</span>
        
    </div>
     <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'admin_dashboard')); ?>">Dashboard</a></li>
                <li><a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'admin_index')); ?>">User Management</a></li>
                 <li class="current"><a href="javascript:void:(0)">Edit <?php if($use['User']['usertype_id']==6){ echo "User";}else if($use['User']['usertype_id']==5){echo "Admin";} ?></a></li>
            </ul>
        </div>
    </div>
    
    <!-- Main content -->
    <div class="wrapper">

    
    	<!-- Chart -->
 
            
         <div class="widget fluid">
        <div class="whead"><h6>Edit <?php if($use['User']['usertype_id']==7){ echo "Student";}else if($use['User']['usertype_id']==8){echo "Employer";} ?></h6></div>
        <div id="dyn" class="hiddenpars">
             <?php echo $this->Form->create('User',array('id'=>'validate')); ?>
                <div class="formRow">
                    <div class="grid3"><label><?php if($use['User']['usertype_id']==7){ echo "Student Username";}else if($use['User']['usertype_id']==8){echo "Company Name :";} ?> <em style="color:red;">*</em></label></div>
                    <div class="grid9">
					<?php if($use['User']['usertype_id']==7){ ?>
                    <?php echo $this->Form->input('username', array('label'=>"",'type'=>'text',"readonly"));?>
					<?php } else { ?>
					<?php echo $this->Form->input('company_name', array('label'=>"",'type'=>'text',"readonly"));?>
					<?php } ?>
                    </div>
                </div>
                <input type="hidden" value="<?php echo $use['User']['id'] ?>" name="edt_id" />
                <div class="formRow">
                    <div class="grid3"><label>Email:<em style="color:red;">*</em></label></div>
                    <div class="grid9">
                    <?php echo $this->Form->input('email', array('label'=>"",'type'=>'email','required',"readonly"));?>
                    </div>
                </div>
             
            
            <!-- <div class="formRow">
                    <div class="grid3"><label>Last Name:<em style="color:red;">*</em></label></div>
                    <div class="grid9">
                    <?php echo $this->Form->input('last_name', array('label'=>"",'type'=>'text','id'=>'lname','required'));?>
                    </div>
                </div>-->
            <div class="formRow">
                    <div class="grid3"><label>Contact Number:<em style="color:red;">*</em></label></div>
                    <div class="grid9">
                    <?php echo $this->Form->input('contact', array('label'=>"",'type'=>'text','class' => "numeric",'maxlength'=>'20','required'));?>
					      <span class="error" style="color: Red; display: none">* Input digits (0 - 9)</span>
                    </div>
                </div>
           
                <div class="formRow">
                    <div class="grid3"><label></label></div>
                    <div class="save_but">
                               <button type="submit" name="Save" id="update" class="buttonS bLightBlue" >Save</button>
                    </div>
					 <div class="grid2">
                               <a  href="<?php echo $this->webroot; ?>admin/users" class="buttonS bLightBlue" >Cancel</a>
                    </div>
                </div>
           </form>
     
        </div>  
          
        </div>        
    </div>
</div>

<script type="text/javascript">
                  $("#fname").keypress(function(e) {
    if(e.which < 97 /* a */ || e.which > 122 /* z */) {
        e.preventDefault();
	//return false;
   }
});
            $("#lname").keypress(function(e) {
    if(e.which < 97 /* a */ || e.which > 122 /* z */) {
        e.preventDefault();
    }
});

        </script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        $(function () {
            $(".numeric").bind("keypress", function (e) {
                var keyCode = e.which ? e.which : e.keyCode
                var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
                $(".error").css("display", ret ? "none" : "inline");
                return ret;
            });
            $(".numeric").bind("paste", function (e) {
                return false;
            });
            $(".numeric").bind("drop", function (e) {
                return false;
            });
        });
		// $('#validate').validate();
    </script>
<script type="text/javascript">
   $(document).ready(function(){
       
	   jQuery.validator.addMethod("phoneUS", function(phone_number, element) {
    phone_number = phone_number.replace(/\s+/g, "");
    return this.optional(element) || phone_number.length > 9 &&
        phone_number.match(/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/);
		}, "Please specify a valid phone number");
	
	   $('#validate').validate();
	  
   });
</script>
      