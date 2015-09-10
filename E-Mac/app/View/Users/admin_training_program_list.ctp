<?php echo $this->element("admin_header"); ?>
<?php echo $this->element("admin_topright"); ?>
<?php echo $this->element("admin_nav"); ?>
<?php echo $this->element("admin_sidebar"); ?> 


<script type="text/javascript">
$(document).ready(function(){
$(".fancybox").fancybox();
});
</script>
<script type="text/javascript">
$(document).ready(function()  {
	var host = window.location.host;
	var proto = window.location.protocol;
	var ajax_url = proto+"//"+host+"/Crowd-Career/admin/";
	$(".editbox").hide();
	$(".edit_tr").click(function()  {
		var ID=$(this).attr('id');
		$("#first_"+ID).hide();
		$("#last_"+ID).hide();
		$("#first_input_"+ID).show();
		$("#last_input_"+ID).show();
	}).change(function()  {
		var ID=$(this).attr('id');
		var first=$("#first_input_"+ID).val();
		var last=$("#last_input_"+ID).val();
		var dataString = 'id='+ ID +'&name='+first+'&link='+last;
		$("#first_"+ID).html('<img src="<?php echo $this->webroot.'img/ajax-loader.gif'; ?>" />'); // Loading image
		if(first.length>0)  {
			$.ajax({
				type: "POST",
				url: ajax_url+"users/training_program_list",
				data: dataString,
				cache: false,
				success: function(html)
				{
					$("#first_"+ID).html(first);
				}
			});
		}  else  {
			alert('Enter something.');
		}
	});
	// Edit input box click action
	$(".editbox").mouseup(function()  {
		return false
	});
	// Outside click action
	$(document).mouseup(function()  {
		$(".editbox").hide();
		$(".text").show();
	});
});
</script>
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-screen"></span>Training Program</span>
        <ul class="quickStats">
            <li>
               <?php //echo $this->Html->image("../images/icons/quickstats/user.png", array('url' => array('controller' => 'users', 'action' => 'index'))); ?>
             <a href="javascript:void();" class="blueImg"><?php echo $this->Html->Image('../images/icons/quickstats/user.png'); ?></a>

                <div class="floatR"><strong class="blue"></strong><span>Admin</span></div>
            </li>
        </ul>
    </div>
     <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'admin_dashboard')); ?>">Dashboard</a></li>
                <li class="current"><a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'admin_training_program_list')); ?>">Training Program Management</a></li>
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
                   
		<ul class="middleNavR">
            <li><a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'admin_training_program')); ?>" title="Add Training Program"  class="tool-tip"><?php echo $this->Html->Image('/images/icons/middlenav/add.png'); ?></a></li>
        </ul>  
    	<!-- Chart -->
 
        
           <!-----------------------filter---------------->
            <br/>
       <!--     <div class="breadLine1" style="margin-bottom: 100px;">
                    <div class="bc1">
                        <?php // echo $this->Form->create('User', array('controller'=>'Users','action'=>'index','id'=>'filter')); ?>			   	 				 	
                            <div>		
                                    <div style="float:left;padding:10px;"> 
                                            <select name="data[type]"  class="selectme">
                                                         <option value="" >Select Type</option>
                                                         <option value="7" >Bar Owner</option>
                                                         <option value="6" >User</option>                                                               	   
                                            </select>
                                    </div>                                     
                                <div style="float:left;padding:10px;"> <button type ="submit" class="buttonS bGreen" name="filter" value="Filter" >Filter</button></div> 
                            </div>
                            </form>
                    </div>
            </div>  -->
	<!------------------end--------------------------->
        
        
        
            
       <div class="widget check grid6">
        <div class="whead">
        <!--<span class="titleIcon"><div id="uniform-titleCheck" class="checker">-->
        <!--</div></span>--><h6>Training Program Management</h6>
       
        <div style="float:right;">
			   <?php echo $this->Form->create('User', array('controller'=>'users','action'=>'admin_training_program_list')); ?>
			   	  
				<div style="margin-top:5px;">		
					<input  type="text" name="keyword" placeholder="Search keyword..." class="tipS tool-tip" title="Enter the keywords like username,email etc..." autocomplete="off">
					<!-- <input value="" type="submit" name="search">-->
				<input type="image" src="<?php echo $this->webroot;?>img/Search.png" alt="Submit"  class="search_img" />

				</div>
					<?php echo $this->Form->end();?>
			</div>
        </div>
        <div id="dyn" class="hiddenpars">
           
             <?php  //echo $this->Form->create('User',array("action" => "deleteall",'id' => 'mbc','name'=>'usr_form')); ?>
            <table cellpadding="0" cellspacing="0" class="tDefault checkAll tMedia" id="checkAll" width="100%">
            <thead>
            <tr>
            <th><?php echo ('Name');?></th>
            <th><?php echo ('Link');?></th>
            <th><?php echo ('Cateory Name');?></th>
            <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php  foreach ($users as $user): ?>
            <tr>
             <!--<td><?php echo $this->Form->checkbox("use"+$user['TrainingProgram']['id'],array('value' => $user['TrainingProgram']['id'],'class'=>'checkAll')); ?></td>-->
            <td>
				<?php echo h($user['TrainingProgram']['name']); ?>
			</td>
            <td>
				<?php echo h($user['TrainingProgram']['link']); ?>
            <td><?php echo h($user['Category']['name']); ?></td>
            <td class="center">
             <form></form>
           <!-- <a href="<?php echo $this->Html->url(array('action' => 'edit', $user['TrainingProgram']['id'])); ?>" class="tablectrl_small bDefault tipS tool-tip" title="Edit"  style="margin-bottom:-7px;"><span class="edit-icn" data-icon="&#xe1db;"></span></a>-->
             <?php echo $this->Form->postLink('<span class="iconb" data-icon="&#xe136;"></span>',array('controller'=>'Users','action'=>'traing_program_delete',$user['TrainingProgram']['id']),array('escape'=>false,'class'=>'tablectrl_small bDefault tipS tool-tip','title'=>'Delete'),__('Are you sure to want to delete?'));?>     	
            </td>
            </tr>
	        <?php endforeach; ?>
            </tbody>
            </table> 
            <br/><br/>
             <div class="tPages">
              <ul class="pages">
               <!--<li class="prev"><?php //echo $this->Paginator->prev('' ,null, null, array('class' => 'icon-arrow-14'));?></li>-->
               <li><?php echo $this->Paginator->numbers(); ?>&nbsp;&nbsp;</li>
               <!--<li class="next"><?php //echo $this->Paginator->next('', null, null, array('class' => 'icon-arrow-17'));?></li>-->
               <!-- prints X of Y, where X is current page and Y is number of pages -->
               <?php //echo $this->Paginator->counter(); ?>
              </ul>
            </div>
		      <?php //debug($this->Paginator->numbers()); ?>
              <div style="margin-top:10px;"></div>
           </form>
             </div>  
        </div>        
    </div>
</div>
</div>

<script>   
        $("#deactive").click(function(){  
                document.usr_form.action = '<?php echo $this->webroot;?>admin/users/deactivateall';
				document.usr_form.submit(); 
        });
		$("#activate").click(function(){  
                document.usr_form.action = '<?php echo $this->webroot;?>admin/users/activateall';
				document.usr_form.submit(); 
        });
</script>  
