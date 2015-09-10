<?php echo $this->element('top-header'); ?>
<style>
.top-div{
height:300px;margin-left:0px;margin-top:10px;
}
.img-con{
float:left;height:80%; width:30%; margin-left:75px; margin-top:20px;
}
.name-con{
float:left;margin-left:20px; margin-top:50px;width:30%;
}
.background{
loat:left;border:1px solid #D4D0C8;margin-left:0px;margin-top:10px;
}
.recomand{
font-size:23px;height:60px;border:1px solid #D4D0C8;width:100%;background-color:white;margin-top:20px;
}
.img:hover{box-shadow:2px 2px 2px;}
</style>
<div class="row-fluid">
<div class="span3" style="margin-left:15px;margin-right:15px;">
<div class="well-small well">
        <h4>Posts you may be interested in</h4>
        <div id="postumayknow">

        </div>
 </div>
<?php //echo $this->Html->script(array('jquery.hovercard')); ?>
  <!--------------banner---------------->
<!--<br/><br/><br/>
    <div class="well-small well">
        <h4>Featured ads</h4>
        <div id="adumayknow">

        </div>
    </div>-->
			  <br/><br/>
       <!----------------------------------->   
</div>
           
			   <div class="span8 well" id="top" style="border:0px;margin-top:-1px;">                                
			     <div class="">                     
				 <!--------------sharing-------------- -->
 <div class="top-div">
 <div class="img-con">
 <?php if($profile['User']['profile_image']==NULL || $profile['User']['profile_image']== '0'){
 echo $this->Html->image('profile.png',array('height'=>'150px','width'=>'90%'));
}else{
 echo $this->Html->image('../files/profileimage/'.$profile['User']['profile_image'],array('style'=>'height: 200px; width:90%; margin-top:15px;',"class"=>"img-polaroid"));
} ?>
 </div>
 <div class="name-con">
 <h4>
 <?php echo ucwords($profile['User']['first_name'])."&nbsp;".ucwords($profile['User']['last_name']); ?>   
 </h4>
<span style="font-size:15px;"><?php foreach($experiance as $exp):
  if($exp['UserWorkSince']['user_id'] == $profile['User']['id']){
	  echo ucwords($exp['UserWorkSince']['exp_title']).",".ucwords($exp['UserWorkSince']['exp_company_name']);
	 break;  } endforeach; ?>
 </span><br/>
 <span style="font-size:15px;">  <?php foreach($education as $exp):
  if($exp['UserEducation']['user_id'] == $profile['User']['id']){
 echo ucwords($exp['UserEducation']['edu_degree']).",". ucwords($exp['UserEducation']['edu_school'])."<br/>".ucwords($exp['UserEducation']['edu_fieldofstudy']); 
 break; } endforeach; ?><br/>
 </span>
 <?php if($profile['User']['id']==$user_id){ ?><a href="/users/profile/<?php echo $user_id; ?>" role="button" class="btn btn-primary" data-toggle="modal"><i class="icon-edit"></i>Edit Profile</a><?php } ?>
 <?php //if($profile['User']['id']!=$user_id){ ?>
<!-- <a href="#message" role="button" class="btn btn-primary" data-toggle="modal"><i class="icon-envelope"></i>Send a message</a>-->
     <?php //} ?>
 </div>  
 </div>
 
  <!-- --------background------------------- -->
   <div class="background">   
    <div style="margin-top:0px;height:40px; background-color:black;color:white;font-size:23px;padding-top:5px;padding-left:10px;">
    Background
    </div>
       </div>     
    <!-- ------------------summary-------------------- -->
   <div  style="margin-top:30px;">
     <span style="font-size:23px;">
     <?php //echo $this->Html->image('summary.png',array('height'=>'25px','width'=>'25px')); ?><h4>Summary </h4></span>
   </div>
   <div id="showsummary" class="well" align="justify"><?php echo $profile['User']['summary']; ?></div>
  
   <!-- --------------------experience---------------- -->
   <div  style="margin-top:30px;">
   <span style="font-size:23px;"><?php //echo $this->Html->image('experiance.png',array('height'=>'25px','width'=>'25px')); ?><h4>Experience</h4></span>
   <div id="showexperiance" class="well" align="justify">
   <?php foreach($experiance as $exp): if($exp['UserWorkSince']['user_id'] == $profile['User']['id']){ ?>
   <div>
   <a href="<?php echo $this->Html->url(array('controller'=>'companies','action'=>'view',$exp['UserWorkSince']['exp_company_name'])); ?>">
   <h4><?php echo $exp['UserWorkSince']['exp_company_name']; ?></h4></a>
   <?php echo $exp['UserWorkSince']['exp_title'].",".$exp['UserWorkSince']['exp_location']."<br/>".
   $exp['UserWorkSince']['exp_time_from']."-".$exp['UserWorkSince']['exp_time_to']."<br/>";?>
   <p class="well" align="justify"><?php echo $exp['UserWorkSince']['exp_description']; ?></p>
   </div>
   <?php } endforeach; ?>
 </div>
   </div>
   <!-- ---------------------education----------------- -->
     <div  style="margin-top:30px;">
     <span style="font-size:23px;"><?php //echo $this->Html->image('education.png',array('height'=>'25px','width'=>'25px')); ?><h4>Education</h4></span>
    </div>
  <div id="showeducation" class="well">
  <?php foreach($education as $edu): if($edu['UserEducation']['user_id'] == $profile['User']['id']){?>
  <div>
   <?php echo "<b>".$edu['UserEducation']['edu_school']."</b><br/>,".$edu['UserEducation']['edu_degree'].",".$edu['UserEducation']['edu_fieldofstudy'].","
.$edu['UserEducation']['edu_grade'].",<br/>".$edu['UserEducation']['edu_activities']; ?>
  </div>
  <br/>
   <?php } endforeach; ?>
  </div>  
   <!---------------skills----------------------------------->
   <div  style="margin-top:30px;">
     <span style="font-size:23px;"><?php //echo $this->Html->image('skills.png',array('height'=>'25px','width'=>'25px')); ?><h4>Skills and Expertise</h4> </span>
    </div>
  <div id="showeducation" class="well">
  <?php foreach($skills as $skill): if($skill['Skill']['user_id'] == $profile['User']['id']){?>
  <div style="float:left;"><?php echo $skill['Skill']['skills']; ?></div>
  <br/>
   <?php } endforeach; ?>
  </div>  
    <!-- ---------------------Groups----------------- -->
      <!-- <div  style="margin-top:30px;">
         <span style="font-size:23px;"><?php echo $this->Html->image('grup.png',array('height'=>'25px','width'=>'25px')); ?>Groups </span>
      </div>
      <div id="showeducation" class="">
	  <?php foreach($group as $grup): if($grup['UserGroup']['user_id'] == $profile['User']['id']){?>
      <div style="float:left;margin-left:30px;margin-bottom:10px;">
		 <a href="<?php echo $this->Html->url(array('controller'=>'UserGroups','action'=>'home_group',$grup['UserGroup']['group_name'])) ?>" > <?php echo $this->Html->image('../files/grouplogo/'.$grup['UserGroup']['logo'],array('style'=>'height:100px;width:250px;','hspace'=>'10','align'=>'left')); ?></a>
           <p><?php echo $grup['UserGroup']['group_name'] ?></p>           
      </div>
   <?php } endforeach; ?>
   </div> -->
    <!-- ----------Companies-------------- -->
     <div style="margin-top:30px; " >
         <span  style="font-size:23px;"><?php //echo $this->Html->image('comp.png',array('height'=>'25px','width'=>'25px')); ?><h4>Companies</h4> </span>
      </div>
      <div id="showeducation" class="">
	  <?php if($com_foll){ foreach($com_foll as $co): if($co['Follower']['user_id'] == $profile['User']['id']){?>
      <div style="float:left;margin-left:30px;margin-bottom:10px;">
          <?php foreach($company as $cf){if($cf['Company']['id'] == $co['Follower']['followee']){ ?>	
          <div>
		  <a href="<?php echo $this->Html->url(array('controller'=>'companies','action'=>'view',$cf['Company']['company_name'])) ?>">
		  <?php 
		  if($cf['Company']['logo']){
		  echo $this->Html->image('../files/companyimg/'.$cf['Company']['logo'],array('style'=>'height:100px;width:225px;','hspace'=>'10','align'=>'left',"title"=>$cf['Company']['company_name']));		  
		  }else{
		  echo $this->Html->image('joblogo.png',array('style'=>'height:100px;width:225px;','hspace'=>'10','align'=>'left',"title"=>$cf['Company']['company_name']));
		  }
		  ?>
		  </a>
          </div>
             <?php }} ?>         
      </div>
   <?php } endforeach;}else{echo "No Records !!";} ?>
   </div> <br/><br/>
    
    
   </div>

					
	
	
	   
				 </div>
				 
			   </div>
			   
<?php  echo $this->element('footer');
 ?>
    <div id="message" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <?php echo $this->Form->create('Message',array('controller'=>'messages','action'=>'add')); ?>
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Send  <?php echo ucwords($profile['User']['first_name']); ?><?php echo ucwords($profile['User']['last_name']); ?> a message</h3>
    </div>
    <div class="modal-body">
        <div class="row-fluid">
            <div class="span4">To</div><div class="span4"><input type="email" value="<?php echo $profile['User']['email'] ?>" name="data[Message][to]" readonly/></div>
        </div>
        <div class="row-fluid">
            <div class="span4">Subject</div><div class="span4"><input type="text" name="data[Message][subject]"/></div>
        </div>
         <div class="row-fluid">
            <div class="span4">Message</div><div class="span4"><textarea name="data[Message][message]"></textarea></div>
        </div>
    </div>
        <input type="hidden" name="data[Message][user_id]" value="<?php echo $user_id; ?>"/>
         <input type="hidden" name="data[Message][status]" value="Sent"/>
         <input type="hidden" name="data[Message][redirect]" value="<?php echo $profile['User']['id']; ?>"/>
         <input type="hidden" name="data[Message][date]" value="<?php echo date("d/m/Y H:i:s"); ?>"/>
    <div class="modal-footer">
    <input type="submit" class="btn btn-primary" value="Send"/>
    </div>
    </form>
    </div>

<script type="text/javascript">
//function adsumayknow(){
//        $.get('/PostJobs/admyno',function(d){
//            $('#adumayknow').children('div').slideUp();
//            $('#adumayknow').html('');
//            d = JSON.parse(d);            
//            var x = '';
//            for(var i = 0; i < d.length;i++){
//                          x += '<div class="well well-small tio_news">';
//                          x += '<img style="height:100px; width:250px;margin-bottom:10px;" src="/img/joblogo.png"/>';
//                          x += '<p><a href="">'+d[i].Ad.title+'</a></p>';
//                          x +=  '<p>'+d[i].Ad.description.substr(0,150)+'</p>' ;   
//                          x += '<p><a href="/Ads/view/'+d[i].Ad.id+'">Read More...&raquo;</a></p>';
//                          x += '</div>';
//            }
//            //console.log(x);
//                $('#adumayknow').html(x);
//        });
//          
//    }
    
      function pstumayknow(){
        $.get('/Home/postumayknow',function(d){
            $('#postumayknow').children('div').slideUp();
            $('#postumayknow').html('');
            d = JSON.parse(d);
            var x = '';
            for(var i = 0; i < d.length;i++){
                 x += '<div class="well well-small tio_news">';
                    if(d[i].PostJob.logo){
                         x += '<a href="/PostJobs/view/'+d[i].PostJob.id+'"><img style="height:100px; width:250px;margin-bottom:10px;" src="/files/postlogo/'+d[i].PostJob.id+d[i].PostJob.logo+'"/></a>';
                    }else{
                          x += '<a href="/PostJobs/view/'+d[i].PostJob.id+'"><img style="height:100px; width:250px;margin-bottom:10px;" src="/img/joblogo.png"/></a>';
                    }
                    x += '<p><a href="/PostJobs/view/'+d[i].PostJob.id+'">'+d[i].PostJob.job_title+'</a></p>';
                    x += '<p><a href="/PostJobs/view/'+d[i].PostJob.id+'">'+d[i].PostJob.company+'</a></p>';
                    x += '<p>Posted on :&nbsp;'+d[i].PostJob.date +'</p>'; 
                    x += '</div>';
            }
            //console.log(x);
                $('#postumayknow').html(x);
        });
        
    }
        $(document).ready(function(){
        adsumayknow();
         pstumayknow();
        adumayknow = setInterval('adsumayknow()',5000);
         postumayknow = setInterval('pstumayknow()',5000);
    });
    </script>