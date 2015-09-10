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
			<li class="icon"><a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'index')) ?>" title="" class="active">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->Html->Image('../images/icons/mainnav/ui.png'); ?><span>User </span></a></li>
			<li class="icon"><a href="<?php echo $this->Html->url(array('controller'=>'categories','action'=>'index')) ?>" title="" class="active">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->Html->Image('../images/icons/mainnav/ui.png'); ?><span>Category </span></a></li>
			<li class="icon"><a href="<?php echo $this->Html->url(array('controller'=>'sitesettings','action'=>'admin_index')) ?>" title="" class="active">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->Html->Image('../images/icons/mainnav/stats.png'); ?><span>Site Settings</span></a></li>

 <!--li class="icon"><a href="<?php echo $this->Html->url(array('controller'=>'sitesettings','action'=>'admin_webservice')) ?>" title="" class="active">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->Html->Image('../images/icons/mainnav/icon.png'); ?><span>Web-services</span></a></li-->
<!--<li class="icon"><a href="<?php echo $this->Html->url(array('controller'=>'staticpages','action'=>'admin_index')) ?>" title="" class="active">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->Html->Image('../images/icons/mainnav/icon.png'); ?><span>Staticpages Management</span></a></li>-->
		
        </ul>
    </div>
    

</div>
<!-- Sidebar ends -->
