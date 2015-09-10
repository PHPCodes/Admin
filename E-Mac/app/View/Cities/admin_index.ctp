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
			// alert(orders);
			$.post('<?php echo $this->webroot; ?>/admin/cities/sortRows', { orders : orders });
		}
	});

});
</script>

<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-screen"></span>City Management</span>
        <ul class="quickStats">
            <li>
               <?php //echo $this->Html->image("../images/icons/quickstats/user.png", array('url' => array('controller' => 'users', 'action' => 'index'))); ?>
             <a href="javascript:void();" class="blueImg"><?php echo $this->Html->Image('../images/icons/mainnav/city8.png'); ?></a>
                <div class="floatR"><strong class="blue"><?php echo count($citiesCount); ?></strong><span>City</span></div>
            </li>
		 </ul>	
    </div>
     <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'admin_dashboard')); ?>">Dashboard</a></li>
                <li class="current"><a href="<?php echo $this->Html->url(array('controller'=>'cities','action'=>'admin_index')); ?>">City Management</a></li>
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
           <li><a href="<?php echo $this->Html->url(array('controller'=>'cities','action'=>'admin_add')); ?>" title="Add City"  class="tool-tip"><?php echo $this->Html->Image('/images/icons/middlenav/add.png'); ?></a></li>
        </ul>    
    	<!-- Chart -->
   
       <div class="widget check grid6">
        <div class="whead">
      <span class="titleIcon">
        <input title="Select All" class="tool-tip" id="titleCheck" name="titleCheck" type="checkbox">
	  </span>
     <h6>City Management</h6>
       
        <div style="float:right;">
			   <?php echo $this->Form->create('City', array('controller'=>'cities','action'=>'index')); ?>
			   	  
				<div style="margin-top:5px;">		
					<input  type="text" name="keyword" placeholder="Search keyword..." class="tipS tool-tip" title="Enter the keywords like username,email etc..." autocomplete="off">
					<!-- <input value="" type="submit" name="search">-->
				<input type="image" src="<?php echo $this->webroot;?>img/Search.png" alt="Submit"  class="search_img" />

				</div>
					<?php echo $this->Form->end();?>
			</div>
        </div>
        <div id="dyn" class="hiddenpars">
           
             <?php  echo $this->Form->create('City',array("action" => "deleteall",'id' => 'mbc','name'=>'city_form')); ?>
            <table cellpadding="0" cellspacing="0" class="tDefault checkAll tMedia tbl_repeat" id="checkAll" width="100%">
            <thead>
            <tr>
            <th></th>
            
            <th><?php echo ('Name'); ?></th>
            <th><?php echo('Images'); ?></th>
            <th><?php echo ('Status');?></th>
            <th><?php echo ('created');?></th>
            <th><?php echo ('modified');?></th>
            <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php  foreach ($cities as $city): ?>
            <tr class="gradeX"  id="order_<?php echo $city['City']['id']; ?>">
             <td><?php echo $this->Form->checkbox("use"+$city['City']['id'],array('value' => $city['City']['id'],'class'=>'checkAll')); ?></td>
            
            <td><?php echo h($city['City']['name']); ?></td>	
            <td><?php echo $this->Html->image(FULL_BASE_URL.$this->webroot.'files/cities/'.$city['City']['image'],array('width'=>'100')); ?></td>
	        <td><?php if($city['City']['status'] == '0'){echo "Deactivated";}else if($city['City']['status'] == '1'){echo "Activated";} ?></td>
            <td><?php echo h($city['City']['created']); ?></td>
            <td><?php echo h($city['City']['modified']); ?></td>
            <td class="center">
             <form></form>
            <a href="<?php echo $this->Html->url(array('action' => 'edit', $city['City']['id'])); ?>" class="tablectrl_small bDefault tipS tool-tip" title="Edit"  style="margin-bottom:-7px;"><span class="edit-icn" data-icon="&#xe1db;"></span></a>
             <?php echo $this->Form->postLink('<span class="iconb" data-icon="&#xe136;"></span>',array('controller'=>'cities','action'=>'delete',$city['City']['id']),array('escape'=>false,'class'=>'tablectrl_small bDefault tipS tool-tip','title'=>'Delete'),__('Are you sure to want to delete?'));?>    
                    
           <a href=" <?php echo $this->Html->url(array('action' => 'view', $city['City']['id'])); ?>" class="tablectrl_small bDefault tipS" title="View"><span class="iconb" data-icon="&#xe1f7;"></span></a>
            
             <?php if ($city['City']['status']=='0'){?>
			<?php echo $this->Form->postLink('<span class="iconb" data-icon="&#xe1bf;"></span>', array('action' => 'activate', $city['City']['id']),array('escape'=>false,'class'=>'tablectrl_small bDefault tipS tool-tip','title'=>'Active'));?><?php }else { ?>
 <?php echo $this->Form->postLink('<span class="iconb" data-icon="&#xe1c1;"></span>', array('action' => 'block', $city['City']['id']), array('escape'=>false,'class'=>'tablectrl_small bDefault tipS tool-tip','title'=>'Block')); ?><?php }?>
  
			
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
                document.city_form.action = '<?php echo $this->webroot;?>admin/cities/deactivateall';
				document.city_form.submit(); 
        });
		$("#activate").click(function(){  
                document.city_form.action = '<?php echo $this->webroot;?>admin/cities/activateall';
				document.city_form.submit(); 
        });

</script>
      
