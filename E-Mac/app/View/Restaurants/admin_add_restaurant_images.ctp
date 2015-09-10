<?php echo $this->element("admin_header"); ?>
<?php echo $this->element("admin_topright"); ?>
<?php echo $this->element("admin_nav"); ?>
<?php echo $this->element("admin_sidebar"); ?> 

<!--------------------------->
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-screen"></span>Restaurant Images</span>
		    </ul>	
    </div>
     <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'admin_dashboard')); ?>">Dashboard</a></li>
                <li><a href="<?php echo $this->Html->url(array('controller'=>'Restaurants','action'=>'admin_index')); ?>">Restaurant Images</a></li>
                 <li class="current"><a href="javascript:void:(0)">Add Restaurant Images</a></li>
            </ul>
        </div>
    </div>
    <?php // debug($CityList); ?>
    <div class="wrapper">
    <?php 
	
	$x=$this->Session->flash();if($x){ ?>
    <div class="nNote nSuccess" id="flash">
       <div class="alert alert-success" style="text-align:center" ><?php echo $x; ?></div>
     </div><?php } ?>
    	<!-- Chart -->
     <div class="widget fluid">
        <div class="whead"><h6>Add Restaurant Images</h6></div>
        <div id="dyn" class="hiddenpars">
             <?php echo $this->Form->create('Restaurant',array('action'=>'admin_addRestaurantImages','id'=>'validate','type'=>'file', 'enctype'=>'multipart/form-data')); ?>
                
				<div class="formRow">
                    <div class="grid3"><label> Image:</label></div>
                    <div class="grid9">
					
						<?php 
						echo $this->Form->input('image', array('name' => 'data[image][]','type' => 'file', 'required' => 'required', 'label'=>false, 'multiple' => true));
						 
						echo $this->Form->hidden('restaurant_id', array('type' => 'hidden', 'value' => $id));
						?>
							
						<p><div id="myLabel" style="color:red;"><strong>Select multiple image with the help of CTRL key.</strong></div></p>	
						
						<!--<p><div id="myLabel" style="color:red;"><strong>
						<img src='".FULL_BASE_URL.$this->webroot.'files/restaurants/restaurantsImages/loading.gif' width='130' height='130'><span>DELETE</span></div>
						</strong></div></p>	-->
                    </div>
					<div class="grid3"><label></label></div>
                    <div id="save_submit" class="save_but" style="margin:0;"> 
                    <button type="submit" name="Save" id="update" class="buttonS bLightBlue" >Save</button>
                    </div>
					
					<div id="savingLoaderLebel" style="display:none;color:red;">
                    <strong><img src="<?php echo FULL_BASE_URL.$this->webroot;?>files/loader.gif"> Loading Images. Please wait.......
                    </strong></div>
					
					
					<div id="cancle_submit" class="grid2">
                    <a href="<?php echo $this->webroot; ?>admin/restaurants/index" class="buttonS bLightBlue" id="cancel" >Cancel</a>
                    </div>
                </div> 
           </form>
        </div>  
        </div>        
    </div>
	<div class="wrapper">
		<div class="widget fluid">
			<div class="whead">
				<h6>View Existing Restaurant Images</h6>
				<h6 id="deleteImgLabel" style="color:red;float:left;display:none;"><img src="<?php echo FULL_BASE_URL.$this->webroot;?>files/loader.gif"> Delete Images. Please wait.......</h6>
			</div>
			<div id="dyn" class="hiddenpars">
				<div class="formRow">
                    <div class="grid12">
					
  
						<?php 
						if(!empty($getRestImg)){
							foreach($getRestImg as $key => $val){
								echo '<div id="imgContailer_'.$val['Restaurantimage']['id'].'" style="width:130px; height:130px;float:left;margin:0 3px 3px 0;">';
								echo "<img src='".FULL_BASE_URL.$this->webroot.'files/restaurants/restaurantsImages/'.$val['Restaurantimage']['images']."' width='130' height='130'><span><a onclick='delRestImg(".$val['Restaurantimage']['id'].")' title='Delete Image' id='delRestImg' class=''><span class='iconb' data-icon='&#xe136;'></span></a></span></div>";
							}
						} 
						else{
							echo '<strong style="color:red;">No Existing Restaurant Images. Use Browse Button For Uploading.</strong>';
						}
						?>
						
                </div> 
			</div>  
        </div>        
    </div>
	
</div>
<script type="text/javascript" src="<?php echo $this->webroot; ?>js/jquery.validate.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#validate").validate({
			rules: {
				'data[image][]': 'required'
			},
			messages: {
				'data[image][]': "Please browse the images first"
			},
			
			submitHandler: function(form) {
			$('#savingLoaderLebel').show();
			$('#myLabel').hide();
			$('#save_submit').hide();
			$('#cancle_submit').hide();
			form.submit();
			}
		});
	});
	
	function delRestImg(id){
		if(confirm('Are you sure to want to delete?')){
			$.ajax({
				url: '<?php echo $this->Html->url(array('controller'=>'restaurants','action' => 'deleteRestaurantImage')); ?>',
				type: 'POST',
				data: 'id='+id,
				beforeSend : function(){
					$('#deleteImgLabel').show();
				},
				success: function (data) {
					$('#deleteImgLabel').hide();
					$("#imgContailer_"+id).animate({
						opacity:'0',
						height:'0px',
						width:'0px'
					});
				}
			});
		}
	}
</script>