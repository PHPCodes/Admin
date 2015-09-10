<?php echo $this->element("admin_header"); ?>
<?php echo $this->element("admin_topright"); ?>
<?php echo $this->element("admin_nav"); ?>
<?php echo $this->element("admin_sidebar"); ?> 

<!--------------------------->
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-screen"></span>Site Setting Management</span>
        
    </div>
     <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'admin_dashboard')); ?>">Dashboard</a></li>
                <li><a href="<?php echo $this->Html->url(array('controller'=>'Sitesettings','action'=>'admin_index')); ?>">Site Setting Management</a></li>
                 <li class="current"><a href="javascript:void:(0)">Edit Site Settings</a></li>
            </ul>
        </div>
    </div>
    
    <!-- Main content -->
    <div class="wrapper">

    	<!-- Chart -->
 
            
         <div class="widget fluid">
        <div class="whead"><h6>Edit Site Settings</h6></div>
        <div id="dyn" class="hiddenpars">
             <?php echo $this->Form->create('Sitesetting',array('type'=>'file')); ?>
                <div class="formRow">
                    <div class="grid3"><label>Title:</label></div>
                    <div class="grid9">
                    <?php echo $this->Form->input('title',array('label'=>"",'class'=>'tool-tip','title'=>'Enter Site Title')); ?>
                    </div>
                </div>
                
                <div class="formRow">
                    <div class="grid3"><label>Web URL:</label></div>
                    <div class="grid9">
                    <?php echo $this->Form->input('web_url',array('label'=>"",'class'=>'tool-tip','title'=>'Enter Site Web URL')); ?>
                    </div>
                </div>
                
				
				
				
                <div class="formRow">
                    <div class="grid3"><label>Keywords:</label></div>
                    <div class="grid9">
                    <?php echo $this->Form->input('keywords',array('label'=>"",'class'=>'tool-tip','title'=>'Enter Site Keywords')); ?>
                    </div>
                </div> 
                
                <div class="formRow">
                    <div class="grid3"><label>Site Email:</label></div>
                    <div class="grid9">
                    <?php echo $this->Form->input('site_email',array('label'=>"",'type'=>'email','class'=>'tool-tip','title'=>'Enter Site Site Email'));?>
                    </div>
                </div> 
                
                <div class="formRow">
                    <div class="grid3"><label>Facebook URL:</label></div>
                    <div class="grid9">
                    <?php echo $this->Form->input('facebook_url',array('label'=>"",'class'=>'tool-tip','title'=>'Enter Site Facebook URL'));?>
                    </div>
                </div> 
                
                <div class="formRow">
                    <div class="grid3"><label>Twitter URL:</label></div>
                    <div class="grid9">
                    <?php echo $this->Form->input('twitter_url',array('label'=>"",'class'=>'tool-tip','title'=>'Enter Site Twitter URL'));?>
                    </div>
                </div> 
                
                <div class="formRow">
                    <div class="grid3"><label>Google URL:</label></div>
                    <div class="grid9">
                    <?php echo $this->Form->input('googleplus',array('label'=>"",'class'=>'tool-tip','title'=>'Enter Site Google URL'));?>
                    </div>
                </div> 
                
                <div class="formRow">
                    <div class="grid3"><label>Site Description:</label></div>
                    <div class="grid9">
                    <?php echo $this->Form->input('site_desc',array('label'=>"",'type'=>'textarea','class'=>'tool-tip','title'=>'Enter Site Site Description'));?>
                    </div>
                </div>   
                
                 <div class="formRow">
                    <div class="grid3"><label>Site Address:</label></div>
                    <div class="grid9">
                    <?php echo $this->Form->input('site_address',array('label'=>"",'type'=>'textarea','class'=>'tool-tip','title'=>'Enter Site Site Address')); ?>
                    </div>
                </div> 

                			
				
                <div class="formRow">
                    <div class="grid3"><label></label></div>
                    <div class="save_but">
                    <button type="submit" name="Save" id="update" class="buttonS bLightBlue" >Save</button>
                    </div>
					<div class="grid2">
                    <a href="<?php echo $this->webroot; ?>admin/Sitesettings/index" class="buttonS bLightBlue" >Cancel</a>
                    </div>
                </div>
           </form>
     
        </div>  
          
        </div>        
    </div>
</div>

      