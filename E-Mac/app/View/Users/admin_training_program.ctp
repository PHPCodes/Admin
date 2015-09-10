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
        <span class="pageTitle"><span class="icon-screen"></span>Add Training Program</span>
      
    </div>
     <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'admin_dashboard')); ?>">Dashboard</a></li>
                <li><a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'admin_training_program')); ?>">Add Training Program</a></li>
                 <li class="current"><a href="javascript:void:(0)">Add Training Program</a></li>
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
        <div class="whead"><h6>Add Training Program</h6></div>
        <div id="dyn" class="hiddenpars">
             <?php echo $this->Form->create('User',array('action'=>'admin_training_program','type'=>'file','id'=>'validate')); ?>
               
                 <div class="formRow">
                    <div class="grid3"><label>Select Category</label></div>
                    <div class="grid9">
					<select name='data[TrainingProgram][category_id]' required="required">
						<option value="">Select Category</option>
						<?php foreach ($data as $info) { ?>
						<option value="<?php echo $info['Category']['id']; ?>"><?php echo $info['Category']['name']; ?></option>
						<?php } ?>
					</select>
                    </div>
                </div>           
       
                <div class="formRow">
                    <div class="grid3"><label>Program Name :</label></div>
                    <div class="grid9">
                    <input type ="text" name="data[TrainingProgram][name]" required="required">
                    </div>
                </div>
                <div class="formRow">
                    <div class="grid3"><label>Link :</label></div>
                    <div class="grid9">
					<input type ="text" name="data[TrainingProgram][link]" required="required">
                    </div>
                </div>
               
                <div class="formRow">
                    <div class="grid3"><label></label></div>
                    <div class="save_but">
                    <button type="submit" id="update" class="buttonS bLightBlue" >Save</button>
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
      
