<?php echo $this->element("admin_header"); ?>
<?php echo $this->element("admin_topright"); ?>
<?php echo $this->element("admin_nav"); ?>
<?php echo $this->element("admin_sidebar"); ?>
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-screen"></span>Static Pages Management</span>
        <ul class="quickStats">
            <li>
                <a href="" class="blueImg"><?php echo $this->Html->Image('../images/icons/quickstats/plus.png'); ?></a>
                <div class="floatR"><strong class="blue"><?php echo count($staticpages);?></strong><span>Static Pages</span></div>
            </li>
        </ul>
    </div>
     <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'admin_dashboard')); ?>">Dashboard</a></li>
                <li class="current"><a href="<?php echo $this->Html->url(array('controller'=>'Staticpages','action'=>'admin_index')); ?>">Static Pages Management</a></li>
            </ul>
        </div>
    </div>
    
    <!-- Main content -->
    <div class="wrapper">
    
         <?php $x=$this->Session->flash(); ?>
         <?php if($x){ ?>
        <div class="nNote nSuccess" id="flash">
         <div class="alert alert-success" style="text-align:center" > <?php echo $x; ?></div> 
         </div>                
        <?php } ?>   
         <div class="widget check grid6">
        <div class="whead"><!--<span class="titleIcon"><div id="uniform-titleCheck" class="checker">--><span class="titleIcon"><input title="Select All" class="tool-tip" id="titleCheck" name="titleCheck" type="checkbox"></span><!--</div></span>--><h6>Staticpage Management</h6></div>
        <div id="dyn" class="hiddenpars">
            <a class="tOptions"><img src="../images/icons/options" alt="" /></a>
             <?php  echo $this->Form->create('Staticpage',array("action" => "deleteall",'id' => 'mbc')); ?>
            <table cellpadding="0" cellspacing="0" class="tDefault checkAll tMedia" id="checkAll" width="100%">
            <thead>
            <tr>
            <th></th>
            <th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('content'); ?></th>
            <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
	foreach ($staticpages as $staticpage): ?>
            <tr class="gradeX">
             <td><?php echo $this->Form->checkbox("use"+$staticpage['Staticpage']['id'],array('value' => $staticpage['Staticpage']['id'],'class'=>'checkAll')); ?></td>
		<td><?php echo h($staticpage['Staticpage']['title']); ?>&nbsp;</td>
		<td width="60%"><?php echo h(substr(strip_tags($staticpage['Staticpage']['content']),0,200)); ?>&nbsp;</td>
            <td class="center">
             <form></form> 
            <a href="<?php echo $this->Html->url(array('action' => 'edit', $staticpage['Staticpage']['id'])); ?>" class="tablectrl_small bDefault tipS tool-tip" title="Edit"><span class="iconb" data-icon="&#xe1db;"></span></a> 
           <?php if ($staticpage['Staticpage']['status']=='Deactive'){?>
			<?php echo $this->Form->postLink('<span class="iconb" data-icon="&#xe1bf;"></span>', array('action' => 'activate', $staticpage['Staticpage']['id']),array('escape'=>false,'class'=>'tablectrl_small bDefault tipS tool-tip','title'=>'Active'));?><?php }else { ?>
 <?php echo $this->Form->postLink('<span class="iconb" data-icon="&#xe1c1;"></span>', array('action' => 'block', $staticpage['Staticpage']['id']), array('escape'=>false,'class'=>'tablectrl_small bDefault tipS tool-tip','title'=>'Block')); ?><?php }?>
              </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            </table>
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

      