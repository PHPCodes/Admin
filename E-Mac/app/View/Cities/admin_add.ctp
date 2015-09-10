<?php echo $this->element("admin_header"); ?>
<?php echo $this->element("admin_topright"); ?>
<?php echo $this->element("admin_nav"); ?>
<?php echo $this->element("admin_sidebar"); ?> 

<!--------------------------->
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-screen"></span>City Management</span>
        <ul class="quickStats">
            <li>
               <?php //echo $this->Html->image("../images/icons/quickstats/user.png", array('url' => array('controller' => 'users', 'action' => 'index'))); ?>
             <a href="javascript:void();" class="blueImg"><?php echo $this->Html->Image('../images/icons/mainnav/city8.png'); ?></a>
                <div class="floatR"><strong class="blue"><?php echo count($cities); ?></strong><span>City</span></div>
            </li>
		 </ul>	
    </div>
     <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'admin_dashboard')); ?>">Dashboard</a></li>
                <li><a href="<?php echo $this->Html->url(array('controller'=>'cities','action'=>'admin_index')); ?>">City Management</a></li>
                 <li class="current"><a href="javascript:void:(0)">Add New City</a></li>
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
        <div class="whead"><h6>Add City</h6></div>
        <div id="dyn" class="hiddenpars">
             <?php echo $this->Form->create('City',array('action'=>'admin_add','id'=>'validate','type'=>'file')); ?>
                <div class="formRow">
                    <div class="grid3"><label>City Name:<em class="astresik">*</em></label></div>
                    <div class="grid9">
                    <?php echo $this->Form->input('name', array('label'=>"",'type'=>'text','class'=>'validate[required]','required'));?>
                    </div>
                </div>
                
                <div class="formRow">
                    <div class="grid3"><label>Image:<em class="astresik">*</em></label></div>
                    <div class="grid9">
                    <?php echo $this->Form->input('image', array('label'=>"",'type'=>'file','class'=>'validate[required]','id'=>'fuPhoto','required'));?>
					<p><div id="myLabel" style="color:red;"></div></p>
                    </div>
                </div> 

	
                 <?php // echo $this->Form->input('register_date', array('label'=>"",'type'=>'hidden','value'=>date('Y-m-d')));?>
				 <?php // echo $this->Form->input('status', array('label'=>"",'type'=>'hidden','value'=>'1'));?>
                <div class="formRow">
                    <div class="grid3"><label></label></div>
                    <div class="save_but">
                    <button type="submit" name="Save" id="update" class="buttonS bLightBlue" >Save</button>
                    </div>
					<div class="grid2">
                    <a href="<?php echo $this->webroot; ?>admin/cities/index" class="buttonS bLightBlue" >Cancel</a>
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
<script type="text/javascript">
   $(document).ready(function(){
      $('#validate').validate();
     $('#fuPhoto').change(
            function () {
				//get the file size and file type from file input field
      		 var fsize = $('#fuPhoto')[0].files[0].size;
              var fileExtension = ['png','jpg','jpeg'];
                if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                    $('#myLabel').html("File must be '.png' , 'jpeg' and 'jpg' type,and max. 300 KB.");
					$(":submit").attr("disabled", true);
				} 
				else if(fsize>300000){ 
					
					$('#myLabel').html("File must be less than 300 KB.");
					$(":submit").attr("disabled", true);
				
				}
								
				else if(fsize<=300000){ 
					
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