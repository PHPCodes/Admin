<?php echo $this->element("admin_header"); ?>
<?php echo $this->element("admin_topright"); ?>
<?php echo $this->element("admin_nav"); ?>
<?php echo $this->element("admin_sidebar"); ?> 
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-screen"></span>Category Management</span>
        <ul class="quickStats">
            <li>
                <a href="" class="blueImg"><img src="images/icons/quickstats/plus.png" alt="" /></a>
                <div class="floatR"></div>
            </li>
        </ul>
    </div>
     <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'admin_dashboard')); ?>">Dashboard</a></li>
				       <li><a href="<?php echo $this->Html->url(array('controller'=>'Categories','action'=>'admin_index')); ?>">Category Management</a></li>
                 <li class="current"><a href="javascript:void:(0)">Add New Category</a></li>
            </ul>
        </div>
    </div>
    
    <!-- Main content -->
    <div class="wrapper">
     <?php $x=$this->Session->flash(); ?>
     <?php if($x){ ?>
     <div class="nNote nSuccess" id="flash">
       <div class="alert alert-success" style="text-align:center" ><?php echo $x; ?></div>
     </div><?php } ?>
      <div class="widget fluid">
        <div class="whead"><h6>Add Category</h6></div>
        <div id="dyn" class="hiddenpars">
             <?php echo $this->Form->create('Category',array('action'=>'admin_add','type'=>'file','id'=>'validate')); ?>        
                <div class="formRow">
                    <div class="grid3"><label>Category Name:</label></div>
                    <div class="grid9">
                    <?php echo $this->Form->input('name',array('label'=>'','required'));?>
                    </div>
                </div> 
                <div class="formRow">
                    <div class="grid3"><label></label></div>
                    <div class="grid2">
                    <button type="submit" name="Save" id="update" class="buttonS bLightBlue" >Save</button>
                    </div>
					<div class="grid2">
                    <a href="<?php echo $this->webroot; ?>admin/categories/index" class="buttonS bLightBlue" >Cancel</a>
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
                var fileExtension = ['jpeg', 'jpg'];
                if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                    $('#myLabel').html("Only '.jpeg','.jpg' formats are allowed.");
                }
                else {
                    $('#myLabel').html(" ");
                } 
            })  
   });
</script>



      

      
