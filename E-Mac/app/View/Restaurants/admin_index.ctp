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
			$.post('<?php echo $this->webroot; ?>/admin/restaurants/sortRows', { orders : orders });
		}
	});

});
</script>

<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-screen"></span>Restaurant Management</span>
        <ul class="quickStats">
            <li>
               <?php //echo $this->Html->image("../images/icons/quickstats/user.png", array('url' => array('controller' => 'users', 'action' => 'index'))); ?>
             <a href="javascript:void();" class="blueImg"><?php echo $this->Html->Image('../images/icons/mainnav/restaurantGREY.png'); ?></a>

                <div class="floatR"><strong class="blue"><?php echo count($restCount); ?></strong><span>Restaurant</span></div>
            </li>
    </div>
     <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'admin_dashboard')); ?>">Dashboard</a></li>
                <li class="current"><a href="<?php echo $this->Html->url(array('controller'=>'restaurants','action'=>'admin_index')); ?>">Restaurant Management</a></li>
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
           <li><a href="<?php echo $this->Html->url(array('controller'=>'restaurants','action'=>'admin_add')); ?>" title="Add Restaurant"  class="tool-tip"><?php echo $this->Html->Image('/images/icons/middlenav/add.png'); ?></a></li>
        </ul>    
    	<!-- Chart -->
   
       <div class="widget check grid6">
        <div class="whead">
      <span class="titleIcon">
        <input title="Select All" class="tool-tip" id="titleCheck" name="titleCheck" type="checkbox">
	  </span>
     <h6>Restaurant Management</h6>
       
        <div style="float:right;">
			   <?php echo $this->Form->create('Restaurant', array('controller'=>'restaurants','action'=>'index')); ?>
			   	  
				<div style="margin-top:5px;">		
					<input  type="text" name="keyword" placeholder="Search keyword..." class="tipS tool-tip" title="Enter the keywords like username,email etc..." autocomplete="off">
					<!-- <input value="" type="submit" name="search">-->
				<input type="image" src="<?php echo $this->webroot;?>img/Search.png" alt="Submit"  class="search_img" />

				</div>
					<?php echo $this->Form->end();?>
			</div>
        </div>
        <div id="dyn" class="hiddenpars">
           
             <?php  echo $this->Form->create('Restaurant',array("action" => "deleteall",'id' => 'mbc','name'=>'resto_form')); ?>
            <table cellpadding="0" cellspacing="0" class="tDefault checkAll tMedia tbl_repeat" id="checkAll" width="100%">
            <thead>
            <tr>
            <th></th>
            <th><?php echo ('Restaurant Name'); ?></th>
            <th><?php echo ('City Name'); ?></th>			
            <th><?php echo('Images'); ?></th>
           <!-- <th><?php // echo('video'); ?></th> -->
            <th><?php echo ('Status');?></th>
            <th><?php echo ('Address');?></th>
         <!--   <th><?php // echo ('Reservation');?></th> -->
            <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php  foreach ($restaurants as $restaurant): ?>
			<?php // debug($restaurant); ?>
            <tr class="gradeX"  id="order_<?php echo $restaurant['Restaurant']['id']; ?>">
             <td><?php echo $this->Form->checkbox("use"+$restaurant['Restaurant']['id'],array('value' => $restaurant['Restaurant']['id'],'class'=>'checkAll')); ?></td>
            
            <td><?php echo h($restaurant['Restaurant']['name']); ?></td>	
            <td><?php echo h($restaurant['City']['name']); ?></td>				
            <td><?php echo $this->Html->image(FULL_BASE_URL.$this->webroot.'files/restaurants/'.$restaurant['Restaurant']['image'],array('width'=>'100')); ?></td>
            <!--<td><a  title="<?php // echo$restaurant['Restaurant']['video']; ?>" href="<?php // echo FULL_BASE_URL.$this->webroot.'files/restaurants/video/'.$restaurant['Restaurant']['video']; ?>"  target="_blank"><?php echo $this->Html->image(FULL_BASE_URL.$this->webroot.'files/restaurants/video-thumb/'.$restaurant['Restaurant']['video_thumb'],array('width'=>'100')); ?></a></td>	-->		
	        <td><?php if($restaurant['Restaurant']['status'] == '0'){echo "Deactivated";}else if($restaurant['Restaurant']['status'] == '1'){echo "Activated";} ?></td>
            <td><?php echo h($restaurant['Restaurant']['address']); ?></td>
            <!--<td><?php // echo h($restaurant['Restaurant']['reservation']); ?></td> -->
            <td class="center">
             <form></form>
            <a href="<?php echo $this->Html->url(array('action' => 'edit', $restaurant['Restaurant']['id'])); ?>" class="tablectrl_small bDefault tipS tool-tip" title="Edit"  style="margin-bottom:-7px;"><span class="edit-icn" data-icon="&#xe1db;"></span></a>
             <?php echo $this->Form->postLink('<span class="iconb" data-icon="&#xe136;"></span>',array('controller'=>'restaurants','action'=>'delete',$restaurant['Restaurant']['id']),array('escape'=>false,'class'=>'tablectrl_small bDefault tipS tool-tip','title'=>'Delete'),__('Are you sure to want to delete?'));?>    
                    
           <a href=" <?php echo $this->Html->url(array('action' => 'view', $restaurant['Restaurant']['id'])); ?>" class="tablectrl_small bDefault tipS" title="View"><span class="iconb" data-icon="&#xe1f7;"></span></a>
            
			<?php echo $this->Form->postLink('<span class="iconb" data-icon="&#x002b;"></span>', array('action' => 'addRestaurantImages', $restaurant['Restaurant']['id']),array('escape'=>false,'class'=>'tablectrl_small bDefault tipS tool-tip','title'=>'View Restaurants Images'));?>
			
			
            <?php if ($restaurant['Restaurant']['status']=='0'){?>
			<?php echo $this->Form->postLink('<span class="iconb" data-icon="&#xe1bf;"></span>', array('action' => 'activate', $restaurant['Restaurant']['id']),array('escape'=>false,'class'=>'tablectrl_small bDefault tipS tool-tip','title'=>'Active'));?><?php }else { ?>
			<?php echo $this->Form->postLink('<span class="iconb" data-icon="&#xe1c1;"></span>', array('action' => 'block', $restaurant['Restaurant']['id']), array('escape'=>false,'class'=>'tablectrl_small bDefault tipS tool-tip','title'=>'Block')); ?><?php }?>
			<a href=" <?php echo $this->Html->url(array('action' => 'layout', $restaurant['Restaurant']['id'])); ?>" class="tablectrl_small bDefault tipS" title="Layout"><span class="iconb" data-icon="&#xe1f7;"></span></a>
			
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
                document.resto_form.action = '<?php echo $this->webroot;?>admin/restaurants/deactivateall';
				document.resto_form.submit(); 
        });
		$("#activate").click(function(){  
                document.resto_form.action = '<?php echo $this->webroot;?>admin/restaurants/activateall';
				document.resto_form.submit(); 
        });

</script>
      
