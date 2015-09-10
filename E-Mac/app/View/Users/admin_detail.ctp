<?php echo $this->element("admin_header"); ?>
<?php echo $this->element("admin_topright"); ?>
<?php echo $this->element("admin_nav"); ?>
<?php echo $this->element("admin_sidebar"); ?>
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-screen"></span>User Management</span>
    </div>
     <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'admin_dashboard')); ?>">Dashboard</a></li>
                <li ><a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'admin_index')); ?>">User Management</a></li>
                <li class="current"><a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'admin_detail',$detail['User']['id'])); ?>">User Profile</a></li>
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
                 
 
            
         <div class="widget check grid6">
        <div class="whead">
        

         <?php //debug($detail);exit; ?>
		
              <div style="margin-top:10px;">
              <fieldset>
                <div class="widget fluid" style="margin-top:-10px;"><div style="float:left;">
                    <div class="whead"><h5>Personal Details</h5></div>
             
                       
                        <div class="grid9" style="margin-top:15px;"><span class="icon-user-3"></span><?php  echo $detail['User']['first_name'];?> &nbsp;<?php  echo $detail['User']['last_name'];?></div>
                   
                    
                       
                        <div class="grid9"><span class="icon-mail-2"></span><?php  echo $detail['User']['email'];?> </div>
                 
                    
                       
                        <div class="grid9"><span class="icon-mobile-2"></span><?php  echo $detail['User']['contact'];?> </div>
                    </div>
             <div style="float:right;margin-top:10px;margin-bottom:10px;margin-right:10px;">
         <?php  echo $this->Html->image('/files/profileimage/'.$detail['User']['profile_image'],array('style'=>'height:150px;width:120px;')); ?>
         </div>
              </div> </fieldset>
               
               <div class="whead">
              <fieldset>
                <div class="widget fluid" >
                    <div class="whead"><h5>Educational Details</h5></div>
                     <?php if($edu){ ?>
               <table cellpadding="0" cellspacing="0" class="tDefault checkAll tMedia" id="checkAll" width="100%">
            <thead>
            <tr>
            <th>S No.</th>
            <th>University</th>
            <th>Degree</th>
            <th>Course</th>
            <th>Grade</th>
            <th>Activity</th>
            
            </tr>
            </thead>
            <tbody>
           
            <?php $count=0;?>
            <?php  foreach ($edu as $edus):  ?>
             <tr class="gradeX">
             <?php $count++; ?>
             <td><?php echo $count; ?></td>
             <td><?php echo $edus['UserEducation']['edu_school']; ?></td>
              <td><?php echo $edus['UserEducation']['edu_degree']; ?></td>
               <td><?php echo $edus['UserEducation']['edu_fieldofstudy']; ?></td>
                <td><?php echo $edus['UserEducation']['edu_grade']; ?></td>
                 <td><?php echo $edus['UserEducation']['edu_activities']; ?></td>
                  <?php endforeach;?>
			</tr>
          </tbody>
             
            </table> 
            <?php }
			else{ ?>
			<center>There is no educational record added</center>
			<?php }?>
               </div></fieldset>
              <fieldset>
                <div class="widget fluid" >
                    <div class="whead"><h5>Experience  Details</h5></div>
                     <?php if($exp){ ?>
               <table cellpadding="0" cellspacing="0" class="tDefault checkAll tMedia tDrak" id="checkAll" width="100%">
            <thead>
            <tr>
            <th>S No.</th>
            <th>Company Name</th>
            <th>Designation</th>
            <th>Location</th>
            <th>Strat From</th>
            <th>End To</th>
             
            </tr>
            </thead>
            <tbody>
            <?php $count2=0;?>
            <?php  foreach ($exp as $exps):  ?>
             <tr class="gradeX">
              <?php $count2++; ?>
             <td><?php echo $count2; ?></td>
             <td><?php echo $exps['UserWorkSince']['exp_company_name']; ?></td>
              <td><?php echo $exps['UserWorkSince']['exp_title']; ?></td>
               <td><?php echo $exps['UserWorkSince']['exp_location']; ?></td>
                <td><?php echo $exps['UserWorkSince']['exp_time_from']; ?></td>
                 <td><?php echo $exps['UserWorkSince']['exp_time_to']; ?></td>
                  
                  <?php endforeach; ?>
            </tbody>
            </table> 
            <?php }
			else{ ?>
			<center>There is no experience record added</center>
			<?php }?>
              </div> </fieldset>
             
      </div>
             </div>  
        </div>        
    </div>
</div>
