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
                <li class="current"><a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'admin_profile')); ?>">Administrator Profile</a></li>
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
        <div class="whead"><h6>View Profile</h6></div>
        <div id="dyn" class="hiddenpars">
        <div style="float:right;margin-right:30px;">[<a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'admin_changepass')); ?>" style="text-align:right;">Change Password</a>]</div>
        <div style="float:right;margin-right:10px;">[<a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'admin_profileedit',$profile['User']['id'])); ?>" style="text-align:right;">Edit</a>]</div>
            <div class="formRow">
                    <div class="grid9">
                    <div style="">
                    <?php 
                    if($profile['User']['profile_image']== NULL || $profile['User']['profile_image']=='0'){
                       echo $this->Html->image('admin.png',array('height'=>'200px','width'=>'175px'));
                     }else{ echo $this->Html->image('/files/profileimage/'.$profile['User']['profile_image'],array('class'=>'user_img2'));} ?>
                    </div>
                    </div>
                </div>
                <div class="formRow">
                    <div class="grid3"><label><b>User Name:</b></label></div>
                    <div class="grid9">
                    <?php echo $profile['User']['username'];?>
                    </div>
                </div>
                
                <div class="formRow">
                    <div class="grid3"><label><b>Email:</b></label></div>
                    <div class="grid9">
                    <?php echo $profile['User']['email']; ?>
                    </div>
                </div>
         <div class="formRow">
                    <div class="grid3"><label><b>First Name:</b></label></div>
                    <div class="grid9">
                         <?php echo $profile['User']['first_name']; ?>
                    
                    </div>
                </div>
            
             <div class="formRow">
                    <div class="grid3"><label><b>Last Name:</b></label></div>
                    <div class="grid9">
                         <?php echo $profile['User']['last_name']; ?>
                    
                    </div>
                </div>
                <div class="formRow">
                    <div class="grid3"><label><b>Contact No:</b></label></div>
                    <div class="grid9">
                    <?php if($profile['User']['contact']== NULL || $profile['User']['contact']=='0'){echo "Not Mentioned";}else{ echo $profile['User']['contact']; }?>
                    </div>
                </div>
                
                 
                
          
     
        </div>  
          
        </div>        
    </div>
</div>

      