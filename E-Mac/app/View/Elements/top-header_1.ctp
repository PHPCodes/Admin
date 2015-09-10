   
<div class="container-fluid" style="margin:0px; padding:0px; overflow:auto;">
    <div class="row-fluid" style="background-color:#58595b;border-bottom:5px solid white;">
   <!-- first -->
    <div class="span8">
	  <div class="span4"><a href="http://linked.apnaphp.com">
			<?php echo $this->Html->image('ss_44.png'); ?></a></div>
			<div style="padding-top:20px;float:right;margin-right:150px;font-family:Arial;" class=" span4 visible-desktop" id="login" >				
				  <h4>MATCHING ACADEMICS</h4>
				  <h4>WITH COMPANIES AND</h4>
				  <h4>LIKEMINDED PEOPLE</h4>
			   </div>
	  <div class="visible-desktop"></div>
	</div>
	<!--first end -->
	<!--right -->
	<?php if($user_id){ ?>
	<div class="span4" id="hide">
	 <div class="span12" id="loginbg" >
	   <div class="navbar" style="margin-bottom:0px;">
		  <div class="navbar-inverse" id="loginbg" >
		  <ul class="nav">
				 <li class="dropdown">
					<a  class="dropdown-toggle" data-toggle="dropdown" href="#">Welcome<strong>&nbsp;&nbsp;<?php echo $first_name; ?></strong></a>
					<ul class="dropdown-menu" >
                     <li><a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'setting')); ?>">Setting</a></li>
                     <li><a href="<?php echo $this->Html->url(array('controller'=>'plans','action'=>'subscription')); ?>">Upgrade Your Account</a></li>
					  <li><a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'logout')); ?>">Logout</a></li>
					</ul>
				  </li>
				</ul>						
			<a  href="#" data-trigger="hover" data-content="<h6>No Notifications.</h6>" data-title="Notifications" data-placement="bottom" data-html="true" class="icon-comment mypopover"></a>
				  <a href="#" data-trigger="hover" data-content="<h6>No Messages.</h6>" data-title="Messages" data-placement="bottom" data-html="true" class="icon-leaf mypopover"></a>
				  
			  </div>	
		  </div>	
		   <div class="span12" id="ui">
<!--		    <div class="span6"> Account Type&mdash;<b>Basic</b> &rlm; <a href="#">Add Connections</a> </div>-->
		<div class="span6"><a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'invite')); ?>">Add Connections</a> </div>	
		 
		 </div>  					
		 </div>
		
	 
	 </div>  
	
	</div>
	<?php }else{ ?>
	<div class="span4" id="hide" style="margin:0px;">
            <div class="span12" id="loginbg">
                <div style="margin-left:20px; padding-top:5px; padding-bottom:20px;">
                    <p style=" letter-spacing:2px;font-size:15px; line-height:16px; color:#CCC">ALREADY A MEMBER?</p>
                    <p>
                    <form id="frmlogin2" action="/users/login" method="post">
                        <input name="data[User][username]" style="width: 125px !important; " placeholder="Username or E-mail Address" type="text" />
                        <input name="data[User][password]" style="width: 110px !important; " placeholder="Password" type="password" />
                        <button style="margin-top: -10px;" type="submit" class="btn">Sign In</button> 
                        <span style="color: #fff; margin-top: -10px;">or</span> 
                        <a href="http://www.facebook.com/dialog/oauth?
			client_id=479754455411339&
			redirect_uri=http://linked.apnaphp.com/Loginwith/login&
			state=<?php echo $csrfToken; ?>&
			scope=email"><?php echo $this->Html->image("socialico03_09.png",array('style'=>'height:30px; margin-top: -10px;')); ?></a>
                    </form>
                    <div id="elog" align="center" style="color: #FFF;"></div>
                    <script type="text/javascript" src="/js/jquery.form.js"></script>
                    <script type="text/javascript">
                            $(document).ready(function(e){
                                $('#frmlogin2').ajaxForm({
                                    before: function(event, position, total, percentComplete) {
                                        //$('#lupPRc').html('<img src="https://www.caritas.us/sites/default/files/images/misc/loading.gif"/>');
                                        $('#elog').html("");
                                    },
                                    complete: function(xhr) {
                                        
                                    },
                                    success: function(data){
                                        console.log(data);
                                        $('#elog').html("");
                                        d = JSON.parse(data);
                                        console.log(d);
                                        if(d.error == 1){
                                            //$('.fileupError').html(d.message);
                                            $('#elog').html(d.message);
                                        }else if(d.error == 0){
                                            $('#elog').html(d.message);
                                           window.location = d.redirect;
                                        }
                                    }
                                });
								
                            });
                        </script>
                    </p>
                    
                </div><br/><br/><br/>
                </div>
       </div>

				  <?php } ?>
	<!--right end here -->
  	<!--first section end here -->
	<!--Menu Section -->
	<?php if($user_id){ ?>
	<div class="row-fluid" style="background-color:#58595b;border-bottom:5px solid white;">
   <!-- first -->
   <div class="span8">
   		<div class="navbar" style="margin-top:5px;">
		  <div class="navbar-inverse" >						
			<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			<div class="nav-collapse collapse">
				<ul class="nav">
				   <li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown"  href="#">Home</a>
					<ul class="dropdown-menu">
         
          <li><a href="<?php echo $this->Html->url(array('controller'=>'ads','action'=>'index'))  ?>">Advertise With Us</a></li>
        </ul>
					</li>
				  <li class="dropdown">
					<a  class="dropdown-toggle" data-toggle="dropdown" href="#">Profile</a>
					<ul class="dropdown-menu">
					   <li><a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'profile',$user_id)); ?>">Edit Profile</a></li>
    <li><a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'profile_view',$user_id)); ?>">View Profile</a></li>  
     <li><a href="<?php echo $this->Html->url(array('controller'=>'recommendations','action'=>'recommendation')); ?>">Recommendation</a></li>  
    <li><a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'profile_organizer')); ?>">Profile Organizer</a></li>  
					 </ul>
				  </li>
				  <!-- <li class="dropdown">
					<a  class="dropdown-toggle" data-toggle="dropdown" href="#">Contacts</a>
					<ul class="dropdown-menu">
					  <li><a href="#">Connections</a></li>
					  <li><a href="#">Add Connections</a></li>
					  <li><a href="#">Education</a></li>
					 </ul>
				  </li> -->
				  <li class="dropdown">
					<a  class="dropdown-toggle" data-toggle="dropdown" href="#">Groups</a>
					<ul class="dropdown-menu">
					 <li><a href="<?php echo $this->Html->url(array('controller'=>'UserGroups','action'=>'index')); ?>">My Groups</a></li>
    <li><a href="<?php echo $this->Html->url(array('controller'=>'UserGroups','action'=>'group_add')); ?>">Create Group</a></li>
    <li><a href="<?php echo $this->Html->url(array('controller'=>'UserGroups','action'=>'othergroup')); ?>">Group you may Like</a></li>
    <hr/>
    <?php foreach($group as $gp): if($gp['UserGroup']['user_id']== $user_id){?>
     <li><a href="<?php echo $this->Html->url(array('controller'=>'UserGroups','action'=>'home_group',$gp['UserGroup']['group_name'])); ?>"><?php echo $gp['UserGroup']['group_name']; ?></a></li>
    <?php } endforeach; ?>
					</ul>
				  </li>
				  <li class="dropdown">
					<a  class="dropdown-toggle" data-toggle="dropdown" href="#">Organizations</a>
					<ul class="dropdown-menu">
					   <li><a href="<?php  echo $this->Html->url(array('controller'=>'companies','action'=>'search')); ?>">Search Organizations</a></li><hr/>
					  <?php foreach($mycompany as $cmp): if($cmp['Company']['user_id']== $user_id){?>
     <li><a href="<?php echo $this->Html->url(array('controller'=>'Companies','action'=>'view',$cmp['Company']['company_name'])); ?>"><?php echo $cmp['Company']['company_name']; ?></a></li>
    <?php } endforeach; ?>
					</ul>
				  </li>
				   <li class="dropdown">
					<a  class="dropdown-toggle" data-toggle="dropdown" href="#">Inbox</a>
					<ul class="dropdown-menu">
					  <li><a href="<?php echo $this->Html->url(array('controller'=>'inboxes','action'=>'inbox')); ?>">Accept Invitations</a></li>
					  <li><a href="<?php echo $this->Html->url(array('controller'=>'inboxes','action'=>'inbox')); ?>">View messages</a></li>
					  <li><a href="<?php echo $this->Html->url(array('controller'=>'inboxes','action'=>'inbox')); ?>">Compose message</a></li>
					</ul>
				  </li>
				  <li class="dropdown">
					<a  class="dropdown-toggle" data-toggle="dropdown" href="#">Jobs</a>
					<ul class="dropdown-menu">
                                            <li><a href="<?php echo $this->Html->url(array('controller'=>'postJobs','action'=>'find_job')); ?>">Find Jobs</a></li>
					  <li><a href="<?php echo $this->Html->url(array('controller'=>'postJobs','action'=>'index')); ?>">Post a Job</a></li>					 
                                          <li><a href="<?php echo $this->Html->url(array('controller'=>'postJobs','action'=>'managejob')); ?>">Manage Your Jobs</a></li>					 
					</ul>
				  </li>
				 <li class="dropdown">
					<a  class="dropdown-toggle" data-toggle="dropdown" href="#">News</a>
					<ul class="dropdown-menu">
					  <li><a href="<?php echo $this->Html->url(array('controller'=>'inboxes','action'=>'today_news')); ?>">Academatch Today</a></li>
                                         
					</ul>
				  </li>
				   <li class="dropdown">
					<a  class="dropdown-toggle" data-toggle="dropdown" href="#">More</a>
					<ul class="dropdown-menu">
					  <li><a href="http://help.linked.apnaphp.com">Help Center</a></li>
					  <li><a href="http://help.linked.apnaphp.com">Skills and Expertise</a></li>
					  <li><a href="<?php echo $this->Html->url(array('controller'=>'plans','action'=>'subscription')); ?>">Upgrade Your Account</a></li>
					</ul>
				  </li>
				</ul>
			  </div>	
		  </div>	  					
		</div>
		
   </div>	
	<!--first end -->
	<!--right -->
	<div class="span4" id="hide">
	  <div class="span10">
	        <div class="input-append" style="margin: 10px 0px 5px 20px;">
	        <?php echo $this->Form->create('User',array('type'=>'post', 'action'=>'profile_search','id'=>'com_post','class'=>"form-search")); ?>
<input type="text" class="span10" id="appendedDropdownButton" name="search" placeholder="Enter name or username.....">
<div class="btn-group">
    <button class="btn" type="submit">
    People Search
    <span class="caret"></span>
    </button>
    </div>
</form>
    </div>
	</div>	 
	 </div>  
	<?php } ?>
	</div>
    
     <script>
  $(function() {
  // Setup drop down menu
  $('.dropdown-toggle').dropdown();
 
  // Fix input element click problem
  $('.dropdown input, .dropdown label').hover(function(e) {
    e.stopPropagation();
  });
});
$('.mypopover').popover({  
   content: function(ele) { return $('#popover-content').html(); }
});
   
</script>