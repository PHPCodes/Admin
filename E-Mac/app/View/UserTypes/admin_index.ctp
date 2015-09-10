<?php echo $this->element("admin_header"); ?>
<?php echo $this->element("admin_topright"); ?>
<?php echo $this->element("admin_nav"); ?>
<?php echo $this->element("admin_sidebar"); ?>
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-screen"></span>User Type</span>
        <ul class="quickStats">
            <li>
                <a href="" class="blueImg"><?php echo $this->Html->Image('../images/icons/quickstats/plus.png'); ?></a>
                <div class="floatR"><strong class="blue"><?php echo count($userTypes);?></strong><span>User Type</span></div>
            </li>
        </ul>
    </div>
     <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'admin_dashboard')); ?>">Dashboard</a></li>
                <li class="current"><a href="<?php echo $this->Html->url(array('controller'=>'UserTypes','action'=>'admin_index')); ?>">User Type</a></li>
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
        <div class="whead"><!--<span class="titleIcon"><div id="uniform-titleCheck" class="checker"><span class="titleIcon"><input title="Select All" class="tool-tip" id="titleCheck" name="titleCheck" type="checkbox"></span><!--</div></span>--><h6>User Type</h6></div>
        <div id="dyn" class="hiddenpars">
            <a class="tOptions"><img src="../images/icons/options" alt="" /></a>
             <?php  echo $this->Form->create('NewsArticle',array("action" => "deleteall",'id' => 'mbc')); ?>
            <table cellpadding="0" cellspacing="0" class="tDefault checkAll tMedia" id="checkAll" width="100%">
            <thead>
            <tr>
            <th></th>
            <th><?php echo $this->Paginator->sort('Gorup Name'); ?></th>
	    <th><?php echo $this->Paginator->sort('Authorities'); ?></th>
           </tr>
            </thead>
            <tbody>
           <?php
	foreach ($userTypes as $userType): ?>
            <tr class="gradeX">
             <td></td>
		<td><?php echo $userType['UserType']['group_name']; ?>&nbsp;</td>
		<td width="60%"><?php echo $userType['UserType']['Authorities']; ?>&nbsp;</td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            </table>
            
             <div class="tPages">
              <ul class="pages">
               
              </ul>
            </div>
		      <?php //debug($this->Paginator->numbers()); ?>
              <div style="margin-top:10px;"></div>
           </form>
     
        </div>  
          
        </div>        
    </div>
</div>

      