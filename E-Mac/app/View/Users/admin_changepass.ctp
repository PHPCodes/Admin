<?php echo $this->element("admin_header"); ?>
<?php echo $this->element("admin_topright"); ?>
<?php echo $this->element("admin_nav"); ?>
<?php echo $this->element("admin_sidebar"); ?> 

<!--------------------------->
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-screen"></span>Administrator Profile</span>
    </div>
     <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'admin_dashboard')); ?>">Dashboard</a></li>
                <li ><a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'admin_profile')); ?>">Administrator Profile</a></li>
                <li class="current"><a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'admin_changepass')); ?>">Administrator Change Password</a></li>
            </ul>
        </div>
    </div>
    
    <!-- Main content -->
    <div class="wrapper">
    <?php $x=$this->Session->flash(); ?>
                    <?php if($x){ ?>
                    <div class="nNote nSuccess" id="flash">
                   <div class="alert alert-success" style="text-align:center" >                 
                   <?php echo $x; ?>
                   </div></div>
                   <?php } ?>
        
    

          
         <div class="widget fluid">
        <div class="whead"><h6>Change Password</h6></div>
    <div id="dyn" class="hiddenpars">
             <?php echo $this->Form->create('User',array('action'=>'admin_changepass','id'=>'validate')); ?><div class="formRow">
                    <div class="grid3"><label>Old Password:</label></div>
                    <div class="grid9">
                    <?php echo $this->Form->input('opass', array('label'=>"",'type'=>'text','Placeholder'=>'Old Password...','type'=>'password','required'));?>
                    </div>
                </div>
                <div class="formRow">
                    <div class="grid3"><label>New Password:</label></div>
                    <div class="grid9">
                    <?php echo $this->Form->input('password', array('label'=>"",'Placeholder'=>'New Password...','type'=>'password','required','minlength'=>'3','maxlength'=>'10'));?>
                    </div>
                </div>
                <div class="formRow">
                    <div class="grid3"><label>Confirm Password:</label></div>
                    <div class="grid9">
                    <?php echo $this->Form->input('cpass', array('label'=>"",'Placeholder'=>'Confirm Password...','type'=>'password','required','minlength'=>'3','maxlength'=>'10'));?>
                    </div>
                </div> 
                <div class="formRow">
                    <div class="grid3"><label></label></div>
                    <div class="save_but">
                    <button type="submit" name="Save" id="update" class="buttonS bLightBlue" >Save</button>
                    </div>
					<div class="grid2">
                    <a href="<?php echo $this->webroot; ?>admin/users/profile" class="buttonS bLightBlue" >Cancel</a>
                    </div>
                </div>
           </form>
     
        </div>  
          
        </div>        
    </div>
</div>    
      <script type="text/javascript">
   $(document).ready(function(){
       $('#validate').validate();
   });
</script>
