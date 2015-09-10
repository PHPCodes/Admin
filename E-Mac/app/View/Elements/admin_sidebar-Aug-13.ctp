<?php  echo ""; ?>
<style>
    .icon{margin-left:15px;}
    a span{width:125px;}
    .icon_logo{padding-left: 5px;}
</style>
<!-- Sidebar begins -->
<div id="sidebar">
    <div class="mainNav" style="width:150px;">
        <div class="user">
        <?php
		
		if(isset($ui['User']['profile_image'])=='' || empty($ui['User']['profile_image'])){ ?>   
        <a title="" class="leftUserDrop" href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'admin_profile')); ?>">     
        <?php echo $this->Html->image('/files/profileimage/admin.png',array('class'=>'user_img')); ?>
        <span></span></a><span>Administrator</span>
        <?php }else{  ?>
        <a title="" class="leftUserDrop" href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'admin_profile')); ?>">         
         <?php  echo $this->Html->image('/files/profileimage/'.$ui['User']['profile_image'],array('class'=>'user_img')); ?>
         <span></span></a><span>Administrator</span>
        <?php   } ?>
  
        </div>        
        <!-- Main nav 	-->
        <ul class="nav">
            <li class="icon"><a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'admin_dashboard')); ?>" title="" class="active">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->Html->Image('../images/icons/mainnav/dashboard.png'); ?><span>Dashboard</span></a></li>
			<li class="icon"><a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'index')) ?>" title="" class="active">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->Html->Image('../images/icons/mainnav/ui.png'); ?><span>User Management</span></a></li>
			<li class="icon"><a href="<?php echo $this->Html->url(array('controller'=>'stores','action'=>'admin_index')); ?>" title="" class="active"><?php echo $this->Html->Image('../images/icons/mainnav/tables.png'); ?><span>Store Management</span></a></li>
			<li class="icon"><a href="<?php echo $this->Html->url(array('controller'=>'brands','action'=>'admin_index')); ?>" title="" class="active"><?php echo $this->Html->Image('../images/icons/mainnav/stats.png'); ?><span>Brands Management</span></a></li>
			<li class="icon"><a href="<?php echo $this->Html->url(array('controller'=>'products','action'=>'admin_index')); ?>" title="" class="active"><?php echo $this->Html->Image('../images/icons/mainnav/statistics.png'); ?><span>Product Management</span></a></li>
			<li class="icon"><a href="<?php echo $this->Html->url(array('controller'=>'lounges','action'=>'admin_index')); ?>" title="" class="active"><?php echo $this->Html->Image('../images/icons/mainnav/other.png'); ?><span>Lounge Management</span></a></li>
			<li class="icon"><a href="<?php echo $this->Html->url(array('controller'=>'contents','action'=>'admin_index')); ?>" title="" class="active"><?php echo $this->Html->Image('../images/icons/mainnav/other.png'); ?><span>Content Management</span></a></li>
			<li class="icon"><a href="<?php echo $this->Html->url(array('controller'=>'websites','action'=>'admin_index')); ?>" title="" class="active"><?php echo $this->Html->Image('../images/icons/mainnav/statistics.png'); ?><span>Website Management</span></a></li>
			<li class="icon"><a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'admin_index')); ?>" title="" class="active"><?php echo $this->Html->Image('../images/icons/mainnav/statistics.png'); ?><span>Contact Management</span></a></li>
			<li class="icon"><a href="<?php echo $this->Html->url(array('controller'=>'sitesettings','action'=>'admin_index')); ?>" title="" class="active"><?php echo $this->Html->Image('../images/icons/mainnav/icon.png'); ?><span>Sitesetting Management</span></a></li>
           <!-- <li class="icon"><a href="<?php echo $this->Html->url(array('controller'=>'storeitems','action'=>'admin_index')); ?>" title="" class="active"><?php echo $this->Html->Image('../images/icons/mainnav/icon.png'); ?><span>Store Items Management</span></a></li>--->
        </ul>
    </div>
    

</div>
<!-- Sidebar ends -->