<?php echo $this->element("admin_header"); ?>
<?php echo $this->element("admin_topright"); ?>
<?php echo $this->element("admin_nav"); ?>
<?php echo $this->element("admin_sidebar"); ?> 

<?php echo $this->Html->script(array('jquery.tablednd'));?>
<script type="text/javascript">
$(function() {

	$(".tbl_repeat tbody").tableDnD({
		onDrop: function(table, row) {
			var orders = $.tableDnD.serialize();
			//alert(orders);
			$.post('<?php echo $this->webroot; ?>/admin/users/sortRows', { orders : orders });
		}
	});

});
</script>
<script type="text/javascript">
$(document).ready(function(){
$(".fancybox").fancybox();
});
</script>
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-screen"></span>User Management</span>
        <ul class="quickStats">
            <li>
               <?php //echo $this->Html->image("../images/icons/quickstats/user.png", array('url' => array('controller' => 'users', 'action' => 'index'))); ?>
             <a href="javascript:void();" class="blueImg"><?php echo $this->Html->Image('../images/icons/quickstats/user.png'); ?></a>

                <div class="floatR"><strong class="blue"><?php echo count($usr_admin);?></strong><span>Admin</span></div>
            </li>
        </ul>
    </div>
     <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'admin_dashboard')); ?>">Dashboard</a></li>
                <li class="current"><a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'admin_index')); ?>">User Management</a></li>
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
                   
      <!--  <ul class="middleNavR">
            <li><a href="<?php //echo $this->Html->url(array('controller'=>'users','action'=>'admin_admin')); ?>" title="Add Admin"  class="tool-tip"><?php echo $this->Html->Image('/images/icons/middlenav/add.png'); ?></a></li>
        </ul>    -->
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
        <!--<span class="titleIcon"><div id="uniform-titleCheck" class="checker">--><span class="titleIcon">
        <input title="Select All" class="tool-tip" id="titleCheck" name="titleCheck" type="checkbox"></span>
        <!--</div></span>--><h6>User Management</h6>
       
        <div style="float:right;">
			   <?php echo $this->Form->create('User', array('controller'=>'users','action'=>'index')); ?>
			   	  
				<div style="margin-top:5px;">		
					<input  type="text" name="keyword" placeholder="Search keyword..." class="tipS tool-tip" title="Enter the keywords like username,email etc..." autocomplete="off">
					<!-- <input value="" type="submit" name="search">-->
				<input type="image" src="<?php echo $this->webroot;?>img/Search.png" alt="Submit"  class="search_img" />

				</div>
					<?php echo $this->Form->end();?>
			</div>
        </div>
        <div id="dyn" class="hiddenpars">
           
             <?php  echo $this->Form->create('User',array("action" => "deleteall",'id' => 'mbc','name'=>'usr_form')); ?>
            <table cellpadding="0" cellspacing="0" class="tDefault checkAll tMedia tbl_repeat" id="checkAll" width="100%">
            <thead>
            <tr>
            <th></th>
			<th><?php echo ('Profile Image'); ?></th>
			<th><?php echo ('Username'); ?></th>
            <th><?php echo ('Company Name'); ?></th>
            <th><?php echo ('Email'); ?></th>
            <th><?php echo('Register Date'); ?></th>
            <th><?php echo ('Usergroup');?></th>
            <th><?php echo ('Status');?></th>
            <th><?php echo ('Contact Number');?></th>
            <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php  foreach ($users as $user): ?>
            <tr class="gradeX" id="order_<?php echo $user['User']['id']; ?>">
             <td><?php echo $this->Form->checkbox("use"+$user['User']['id'],array('value' => $user['User']['id'],'class'=>'checkAll')); ?></td>
            <td>
				<a class="fancybox" rel="group" href="<?php echo $this->webroot.'files/profileimage/'.$user['User']['profile_image']; ?>">
					<img src ="<?php echo $this->webroot.'files/profileimage/'.$user['User']['profile_image']; ?>" height="50" width="50" alt="">
				</a>
			</td>
            <td><?php echo h($user['User']['username']); ?></td>
            <td><?php echo h($user['User']['company_name']); ?></td>
            <td><?php echo h($user['User']['email']); ?></td>
            <td><?php echo h($user['User']['register_date']); ?></td>
            <td><?php if($user['User']['usertype_id'] == '5'){echo "Admin";}else if($user['User']['usertype_id'] == '7'){echo "Student";}else if($user['User']['usertype_id'] == '8'){echo "Employer";} ?></td>
			<td><?php if($user['User']['status'] == '0'){echo "Deactivated";}else if($user['User']['status'] == '1'){echo "Activated";} ?></td>
<!--            <td><?php  if($user['User']['usertype_id'] == '7'){                  
                  if ($user['User']['verify']=='0'){   ?>
		<?php echo $this->Form->postLink('Verify', array('action' => 'admin_verify', $user['User']['id']),array('confirm'=>__('Are you Sure To verify %s ?',$user['User']['first_name']),'escape'=>false,'class'=>'tablectrl_small bDefault tipS tool-tip','title'=>'Verify','style'=>'color:orange;'));?>
             <?php }else { ?>
            <span style="color: green;">Verified</span>
             <?php }
             }
             else{
                 echo '-';
             }
             ?>
            </td>            -->
              <td><?php echo h($user['User']['contact']); ?></td>
            <td class="center">
             <form></form>
            <a href="<?php echo $this->Html->url(array('action' => 'edit', $user['User']['id'])); ?>" class="tablectrl_small bDefault tipS tool-tip" title="Edit"  style="margin-bottom:-7px;"><span class="edit-icn" data-icon="&#xe1db;"></span></a>
             <?php echo $this->Form->postLink('<span class="iconb" data-icon="&#xe136;"></span>',array('controller'=>'Users','action'=>'delete',$user['User']['id']),array('escape'=>false,'class'=>'tablectrl_small bDefault tipS tool-tip','title'=>'Delete'),__('Are you sure to want to delete?'));?>    
                    
            <a href=" <?php echo $this->Html->url(array('action' => 'view', $user['User']['id'])); ?>" class="tablectrl_small bDefault tipS" title="View"><span class="iconb" data-icon="&#xe1f7;"></span></a>
            
             <?php if ($user['User']['status']=='0'){ ?>
			<?php echo $this->Form->postLink('<span class="iconb" data-icon="&#xe1bf;"></span>', array('action' => 'activate', $user['User']['id']),array('escape'=>false,'class'=>'tablectrl_small bDefault tipS tool-tip','title'=>'Active'));?><?php }else { ?>
 <?php echo $this->Form->postLink('<span class="iconb" data-icon="&#xe1c1;"></span>', array('action' => 'block', $user['User']['id']), array('escape'=>false,'class'=>'tablectrl_small bDefault tipS tool-tip','title'=>'Block')); ?><?php }?>
  
			
            </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            </table> 
            <br/><br/>
            <button onclick="$('#mbc').submit();" value="Delete" class="buttonS bRed" style="margin-left:20px"> Delete All</button>
<button class="buttonS bGreen" style="margin-left:40px" name="activate" id="activate" value="Activate" >Activate</button>
<button class="buttonS bBlue" style="margin-left:40px" name="deactive" id="deactive" value="Deactivate" >Deactivate</button>    

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
      
