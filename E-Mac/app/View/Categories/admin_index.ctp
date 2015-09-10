<?php echo $this->element("admin_header"); ?>
<?php echo $this->element("admin_topright"); ?>
<?php echo $this->element("admin_nav"); ?>
<?php echo $this->element("admin_sidebar");
?> 
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-screen"></span>Category Management</span>
        <ul class="quickStats">
            <li>
                <div class="floatR"><strong class="blue"><?php echo count($cates);?></strong><span>Categories</span></div>
            </li>
        </ul>
    </div>
     <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'admin_dashboard')); ?>">Dashboard</a></li>
                <li class="current"><a href="javascript:void:(0)">Category Management</a></li>
            </ul>
        </div>
    </div>
    
    <!-- Main content -->
    <div class="wrapper">
     <?php $x=$this->Session->flash();if($x){ ?>
     <div class="nNote nSuccess" id="flash">
       <div class="" style="text-align:center" ><?php echo $x; ?></div>
     </div><?php } ?>
                   
        <ul class="middleNavA">
            <li><a href="<?php echo $this->Html->url(array('controller'=>'Categories','action'=>'admin_add')); ?>" title="Add Category"  class="tool-tip"><?php echo $this->Html->image('/images/icons/color/order-149.png'); ?><span>Add Category</span></a></li>
        </ul>    
    	<!-- Chart -->
      <div class="widget check grid6">
        <div class="whead">
			<span class="titleIcon">
				<input title="Select All" class="tool-tip" id="titleCheck" name="titleCheck" type="checkbox">
			</span>
			<h6>Category Management</h6>
			<div  style="float:right;">
			   <?php echo $this->Form->create('Category', array('controller'=>'Categories','action'=>'index')); ?>
				<div style="margin-top:5px;">			
					<input  type="text" name="keyword" placeholder="Search keyword..." class="tipS tool-tip" title="Enter the keywords like album name, song name,artist,singer etc..." autocomplete="off">
					 <input value="" type="submit" name="search">
					 <input type="image" src="<?php echo $this->webroot;?>img/Search.png" alt="Submit"  class="search_img" />
				</div>
					<?php echo $this->Form->end();?>
			</div>
        </div>
        <div id="dyn" class="hiddenpars">
        
             <?php  echo $this->Form->create('Category',array("action" => "deleteall",'id' => 'mbc')); ?>
             <table cellpadding="0" cellspacing="0" width="100%" class="tDefault checkAll tMedia" id="checkAll">
            <thead>
            <tr>
            <th></th>
            <th><?php echo ('Category Name'); ?></th>	
            <th><?php echo ('Status'); ?></th>
            <th>Action</th>
            </tr>
            </thead>
            <tbody id="itemContainer">
            <?php foreach (@$categories as $category):?>
            <tr class="gradeX">
            <td><?php echo $this->Form->checkbox("category"+$category['Category']['id'],array('value' => $category['Category']['id'],'class'=>'checkAll')); ?></td>
            <td><?php echo h($category['Category']['name']); ?></td>		
            <td><?php if($category['Category']['status']==1){echo"Activate";}else{echo"Blocked";} ?></td>
            <td class="center">
             <form></form>
            <a href="<?php echo $this->Html->url(array('action' => 'edit', $category['Category']['id'])); ?>" class="tablectrl_small bDefault tipS tool-tip" title="Edit"><span class="iconb" data-icon="&#xe1db;"></span></a>
             <?php echo $this->Form->postLink('<span class="iconb" data-icon="&#xe136;"></span>',array('controller'=>'Categories','action'=>'delete',$category['Category']['id']),array('escape'=>false,'class'=>'tablectrl_small bDefault tipS tool-tip','title'=>'Delete'));?>        
      <?php if ($category['Category']['status']=='0'){?>
		<?php echo $this->Form->postLink('<span class="iconb" data-icon="&#xe1bf;"></span>', array('action' => 'activate', $category['Category']['id']),array('escape'=>false,'class'=>'tablectrl_small bDefault tipS tool-tip','title'=>'Active Now'));?><?php }else { ?>
 <?php echo $this->Form->postLink('<span class="iconb" data-icon="&#xe1c1;"></span>', array('action' => 'block', $category['Category']['id']), array('escape'=>false,'class'=>'tablectrl_small bDefault tipS tool-tip','title'=>'Block Now')); ?><?php }?>
            </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            </table> 
            <br/><br/>
            <?php  $url = explode('/',$this->request->url);//print_r($url);?>
                <button onclick="$('#mbc').submit();" value="Delete" class="buttonS bRed" style="margin-left:20px"> Delete All</button>
                <button class="buttonS bGreen" style="margin-left:40px" name="delete" value="Activate" onclick=" <?php if(@$url[2]=='index'){?> $('#mbc').attr({'action':'../activateall'});<?php }else{ ?>$('#mbc').attr({'action':'Categories/activateall'});<?php }?> $('#mbc').submit();">Activate</button>
                <button class="buttonS bBlue" style="margin-left:40px" name="delete" value="Deactivate" onclick=" <?php if(@$url[2]=='index'){?> $('#mbc').attr({'action':'../deactivateall'});<?php }else{?>$('#mbc').attr({'action':'Categories/deactivateall'});<?php }?> $('#mbc').submit();">Deactive</button>
            <div class="tPages">
              <ul class="pages">
            <!--<li class="prev"><?php //echo $this->Paginator->prev('' ,null, null, array('class' => 'icon-arrow-14'));?></li>-->
                <li><?php echo @$this->Paginator->numbers(); ?></li>
                <!--<li class="next"><?php //echo $this->Paginator->next('', null, null, array('class' => 'icon-arrow-17'));?></li>-->
                <!-- prints X of Y, where X is current page and Y is number of pages -->
                <?php //echo $this->Paginator->counter(); ?>
              </ul>
            </div>
		      <?php //debug($this->request->url); ?>
              <div style="margin-top:10px;"></div>
              <input type="hidden" id="currentloc96" name="currentloc" value="" />
              <script type="text/javascript">
			  	$('#currentloc96').val(window.location);
			  </script>
                  <?php echo $this->Form->end(); ?>
               </div>  
         </div>        
    </div>
</div>

      
