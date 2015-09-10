<?php echo $this->element("admin_header"); ?>
<?php echo $this->element("admin_topright"); ?>
<?php echo $this->element("admin_nav"); ?>
<?php echo $this->element("admin_sidebar"); ?> 

<!--------------------------->
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-screen"></span>Site Settings Management</span>
    </div>
     <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'admin_dashboard')); ?>">Dashboard</a></li>
                <li class="current"><a href="<?php echo $this->Html->url(array('controller'=>'sitesettings','action'=>'admin_index')); ?>">Site Setting Management</a></li>
            </ul>
        </div>
    </div>
    
    <!-- Main content -->
    <div class="wrapper">
    <?php $x=$this->Session->flash(); ?>
         <?php if($x){ ?>
        <div class="nNote nSuccess" id="flash">
         <div class="" style="text-align:center" ><?php echo $x; ?></div> 
         </div>                
        <?php } ?>
         <div class="widget check grid6">
        <div class="whead"><h6>Site Setting Management</h6></div>
        <div id="dyn" class="hiddenpars">
            <!--<a class="tOptions"><img src="../images/icons/options" alt="" /></a>-->
             <?php  echo $this->Form->create('Sitesetting',array("action" => "",'id' => 'mbc')); ?>
            <table cellpadding="0" cellspacing="0" class="tDefault checkAll tMedia" id="checkAll" width="100%">
            <thead>
            <tr>
           <th><?php echo 'Title'; ?></th>
			<th><?php echo 'Web_URL'; ?></th>
			<th><?php echo 'Keywords'; ?></th>
			<th><?php echo 'Site_Email'; ?></th>
			<th><?php echo 'Facebook_URL'; ?></th>
			<th><?php echo 'Twitter_URL'; ?></th>
			<th><?php echo 'Google URL'; ?></th>
			 <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
	foreach ($sitesettings as $sitesetting):?>
            <tr class="gradeX">
        <td><?php echo h($sitesetting['Sitesetting']['title']); ?>&nbsp;</td>
		<td><?php echo h($sitesetting['Sitesetting']['web_url']); ?>&nbsp;</td>
                
		<td><?php echo h($sitesetting['Sitesetting']['keywords']); ?>&nbsp;</td>
		<td><?php echo h($sitesetting['Sitesetting']['site_email']); ?>&nbsp;</td>
		<td><?php echo h($sitesetting['Sitesetting']['facebook_url']); ?>&nbsp;</td>
		<td><?php echo h($sitesetting['Sitesetting']['twitter_url']); ?>&nbsp;</td>
		
		<td><?php echo h($sitesetting['Sitesetting']['googleplus']); ?>&nbsp;</td>
		 <td class="center">
            <a href="<?php echo $this->Html->url(array('action' => 'edit', $sitesetting['Sitesetting']['id'])); ?>" class="tablectrl_small bDefault tipS tool-tip" title="Edit"><span class="edit-icn"></span></a>
            
                       </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            </table> 

           </form>
     
        </div>  
          
        </div>        
    </div>
</div>

      