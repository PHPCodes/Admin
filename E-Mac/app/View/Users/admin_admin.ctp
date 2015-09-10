<?php echo $this->element("admin_header"); ?>
<?php echo $this->element("admin_topright"); ?>
<?php echo $this->element("admin_nav"); ?>
<?php echo $this->element("admin_sidebar"); ?> 

<!--------------------------->
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-screen"></span>User Management</span>
        <ul class="quickStats">
            <li>
                <a href="" class="blueImg"><img src="<?php echo $this->webroot;?>images/icons/quickstats/plus.png" alt="" /></a>
                <div class="floatR"></div>
            </li>
        </ul>
    </div>
     <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'admin_dashboard')); ?>">Dashboard</a></li>
                <li><a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'admin_index')); ?>">User Management</a></li>
                 <li class="current"><a href="javascript:void:(0)">Add New Admin</a></li>
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
        <div class="whead"><h6>Add Admin</h6></div>
        <div id="dyn" class="hiddenpars">
             <?php echo $this->Form->create('User',array('action'=>'admin_admin','id'=>'validate')); ?>
                <div class="formRow">
                    <div class="grid3"><label>Admin Name:<em style="color:red;">*</em></label></div>
                    <div class="grid9">
                    <?php echo $this->Form->input('username', array('label'=>"",'type'=>'text','class'=>'required','required'));?>
                    </div>
                </div>
                
                <div class="formRow">
                    <div class="grid3"><label>Email:<em style="color:red;">*</em></label></div>
                    <div class="grid9">
                    <?php echo $this->Form->input('email', array('label'=>"",'type'=>'email','required'));?>
                    </div>
                </div> 
                
                <div class="formRow">
                    <div class="grid3"><label>Password:<em style="color:red;">*</em></label></div>
                    <div class="grid9">
                    <?php echo $this->Form->input('password', array('label'=>"",'type'=>'password','required'));?>
                    </div>
                </div>       

<div class="formRow">
                    <div class="grid3"><label>Name:<em style="color:red;">*</em></label></div>
                    <div class="grid9">
                    <?php echo $this->Form->input('first_name', array('label'=>"",'type'=>'text','required','id'=>'fname'));?>
                    </div>
                </div>
            
            <!-- <div class="formRow">
                    <div class="grid3"><label>Last Name:<em style="color:red;">*</em></label></div>
                    <div class="grid9">
                    <?php echo $this->Form->input('last_name', array('label'=>"",'type'=>'text','required','id'=>'lname'));?>
                    </div>
                </div>-->
            <div class="formRow">
                    <div class="grid3"><label>Contact Number:<em style="color:red;">*</em></label></div>
                    <div class="grid9">
                    <?php echo $this->Form->input('contact', array('label'=>"",'type'=>'text','class'=>'numeric','maxlength'=>'20','required'));?>
					<span class="error" style="color: Red; display: none">* Input digits (0 - 9)</span>
                    </div>
                </div>
            <div class="formRow">
                    <div class="grid3"><label>Summary:<em style="color:red;">*</em></label></div>
                    <div class="grid9">
                    <?php echo $this->Form->input('summary', array('label'=>"",'type'=>'textarea','required'));?>
                    </div>
                </div>

				
 <?php echo $this->Form->input('register_date', array('label'=>"",'type'=>'hidden','value'=>date('Y-m-d')));?>
                <div class="formRow">
                    <div class="grid3"><label></label></div>
                    <div class="save_but">
                    <button type="submit" name="Save" id="update" class="buttonS bLightBlue" >Save</button>
                    </div>
					<div class="grid2">
                    <a href="<?php echo $this->webroot; ?>admin/users/index" class="buttonS bLightBlue" >Cancel</a>
                    </div>
                </div>
           </form>
     
        </div>  
          
        </div>        
    </div>
</div>
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
		 $('#validate').validate();
    </script>
	<!--script type="text/javascript">
	$("#fname").keypress(function(e) {
		if(e.which < 97 /* a */ || e.which > 122 /* z */) {
		e.preventDefault();
	}
	});
	$("#lname").keypress(function(e) {
	if(e.which < 97 /* a */ || e.which > 122 /* z */) {
	e.preventDefault();
	}
	});

	</script-->
      
<script type="text/javascript">
/*   $(document).ready(function(){
       
	   jQuery.validator.addMethod("phoneUS", function(phone_number, element) {
    phone_number = phone_number.replace(/\s+/g, "");
    return this.optional(element) || phone_number.length > 9 &&
        phone_number.match(/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/);
		}, "Please specify a valid phone number");
	
	   $('#validate').validate();
	  
   }); */
</script>
      