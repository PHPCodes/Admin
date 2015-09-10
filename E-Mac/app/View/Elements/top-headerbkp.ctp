<script>
 $(document).ready(function(){
     /*$(window).resize(function(e){
    	 $(".columns").equalHeights();
    	 });*/
	 $(".columns").equalHeights().css({position:'relative'});
 });
</script>
<div class="container-fluid">
    <div class="row-fluid">
    <div class="span8 columns" id="bgcolor" style="margin-left:5px;">
	<table width="100%" id="bgcolor" height="167px">
		<tr>
			<td width="50%" align="left"><a href="http://linked.apnaphp.com">
			<?php echo $this->Html->image('logo_ss.png',array('width'=>'90%')); ?></a></td>
			<td width="50%"  >
				<div style="padding-top:60px;" class="visible-desktop" id="login" >
				
				  <p>MATCHING ACADEMICS</p>
				  <p>WITH COMPANIES AND</p>
				  <p>LIKEMINDED PEOPLE</p>
			   </div>			</td>
		</tr>
	</table>

	</div>
    <div class="span4 columns" style="margin-left:5px;height:170px;background-color:#58595b;">
	     <div id="loginbg"  style="background-color:#58595b;margin-left:26px;" >
		     <div class="login">
			  <?php if(!$user_id){ ?>
			   <p>ALREADY A MEMBER?<br />
			      <b><a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'loggedin')); ?>">SIGN IN</a></b> HERE OR<br />
				  <b><a href="http://linked.apnaphp.com">SIGN UP</a></b> 
				
				  <?php } ?>
				  			  
				 				  <div>
<?php echo $this->Form->create('User',array('type'=>'post', 'action'=>'profile_search','id'=>'com_post','class'=>"form-search")); ?>
<b>Search People</b><input type="text" class="input-medium search-query" name="search" placeholder="Enter name or username....." style="margin-left:3px;">
<button type="submit" class="btn">Search</button>
</form>
<!-- ---------- -->
    <?php if($user_id){ ?>
    <a class="btn btn-inverse btn-mini" href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'logout')); ?>" style="margin-top:20px;margin-left:20px;">Logout</a>
    <div class="dropdown" style="margin-top:20px;float:left;">
    <a class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'profile')); ?>">
    Profile
    <b class="caret"></b>
    </a>
    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="z-index:1000;">
    <li><a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'profile',$user_id)); ?>">Edit Profile</a></li>
    <li><a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'profile_view',$user_id)); ?>">View Profile</a></li>    
    </ul>
     <div class="dropdown" style="margin-left:20px;float:right;">
    <a class="dropdown-toggle" id="dLabel1" role="button" data-toggle="dropdown" data-target="#" href="<?php echo $this->Html->url(array('controller'=>'UserGroups','action'=>'index')); ?>">
    Groups
    <b class="caret"></b>
    </a>
    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel1" style="z-index:1000;">
    <li><a href="<?php echo $this->Html->url(array('controller'=>'UserGroups','action'=>'index')); ?>">My Groups</a></li>
    <li><a href="<?php echo $this->Html->url(array('controller'=>'UserGroups','action'=>'group_add')); ?>">Create Group</a></li>
    <li><a href="<?php echo $this->Html->url(array('controller'=>'UserGroups','action'=>'othergroup')); ?>">Group you may Like</a></li>
    </ul>
    </div>    
    </div>
     <?php } ?>
    <!-- -------------- -->
				      <!-- <table width="40%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><a href="#"><img src="img/socialico03_09.png" width="25" height="27" /></a></td>
    <td><a href="#"><img src="img/socialico03_07.png" width="25" height="27" /></a></td>
    <td><a href="#"><img src="img/socialico03_14.png" width="25" height="27" /></a></td>
    <td><a href="#"><img src="img/socialico03_03.png" width="25" height="27" /></a></td>
  </tr>
</table>-->

				  </div> 
			 </p>			 
			 </div>
		 
	
		 </div>
	
	</div>
    </div>
    <!-- ------------menu------------ -->
    <div class="span4" id="hide">
	   <div class="navbar" style="margin-bottom:0px;">
		  <div class="navbar-inverse" id="loginbg" >
		  <ul class="nav">
				 <li class="dropdown">
					<a  class="dropdown-toggle" data-toggle="dropdown" href="#">Welcome<strong> EMMA!</strong></a>
					<ul class="dropdown-menu" >
					  <li><a href="#">Help Center</a></li>
					  <li><a href="#">Skills and Expertise</a></li>
					  <li><a href="#">Upgrade Your Account</a></li>
					</ul>
				  </li>
				  <li class="dropdown">
					<a  class="dropdown-toggle" data-toggle="dropdown" href="#"><b class="icon-comment"></b></a>
					<ul class="dropdown-menu" >
					  <li><a href="#">Help Center</a></li>
					  <li class="divider"></li>
					  <li><a href="#">Skills and Expertise</a></li>
					  <li><a href="#">Upgrade Your Account</a></li>
					</ul>
				  </li>
				  <li class="dropdown">
					<a  class="dropdown-toggle" data-toggle="dropdown" href="#"><b class="icon-envelope"></b></a>
					<ul class="dropdown-menu" >
					  <li><a href="#">Help Center</a></li>
					  <li class="divider"></li>
					  <li><a href="#">Skills and Expertise</a></li>
					  <li><a href="#">Upgrade Your Account</a></li>
					</ul>
				  </li>
				</ul>						
				<ul class="nav">
				 <li class="dropdown">
					<a  class="dropdown-toggle" data-toggle="dropdown" href="#">More</a>
					<ul class="dropdown-menu" >
					  <li><a href="#">Help Center</a></li>
					  <li><a href="#">Skills and Expertise</a></li>
					  <li><a href="#">Upgrade Your Account</a></li>
					</ul>
				  </li>
				</ul>
			  </div>	
		  </div>	  					
		 </div>
		 <div class="span12" id="ui">
		    <div class="span6"> Account Type&mdash;<b>Basic</b> &rlm; <a href="#">Upgrade</a> </div>
			
		 
		 </div>
	 
	 </div>  
	
	
    <div class="span8">
   		<div class="navbar" style="margin-bottom:0px;">
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
          <li><a href="#">Academatch</a></li>
          <li><a href="#">Advertise With Us</a></li>
        </ul>
					</li>
				  <li class="dropdown">
					<a  class="dropdown-toggle" data-toggle="dropdown" href="#">Profile</a>
					<ul class="dropdown-menu">
					  <li><a href="#">Edit Profile</a></li>
					  <li><a href="#">View Profile</a></li>
					  <li><a href="#">Recommendations</a></li>
					  <li><a href="#">Profile Organizar</a></li>
					  <li><a href="#">Following</a></li>
					 </ul>
				  </li>
				  <li class="dropdown">
					<a  class="dropdown-toggle" data-toggle="dropdown" href="#">Contacts</a>
					<ul class="dropdown-menu">
					  <li><a href="#">Connections</a></li>
					  <li><a href="#">Add Connections</a></li>
					  <li><a href="#">Education</a></li>
					 </ul>
				  </li>
				  <li class="dropdown">
					<a  class="dropdown-toggle" data-toggle="dropdown" href="#">Groups</a>
					<ul class="dropdown-menu">
					  <li><a href="#">Your Groups</a></li>
					  <li><a href="#">Groups You May Like</a></li>
					  <li><a href="#">Groups Directory</a></li>
					  <li><a href="#">Create A Groupe</a></li>
					</ul>
				  </li>
				  <li class="dropdown">
					<a  class="dropdown-toggle" data-toggle="dropdown" href="#">Jobs</a>
					<ul class="dropdown-menu">
					   <li><a href="#">Find Jobs</a></li>
					  <li><a href="#">Job Seekers Premier</a></li>
					  <li><a href="#">Students</a></li>
					   <li><a href="#">Post A Job</a></li>
					  <li><a href="#">Manage Jobs</a></li>
					  <li><a href="#">Find Talent</a></li>
					   <li><a href="#">Talent Solution</a></li>
					</ul>
				  </li>
				  <li class="dropdown">
					<a  class="dropdown-toggle" data-toggle="dropdown" href="#">Inbox</a>
					<ul class="dropdown-menu">
					  <li><a href="#">Accept Invitations</a></li>
					  <li><a href="#">View messages</a></li>
					  <li><a href="#">Compose message</a></li>
					</ul>
				  </li>
				  <li class="dropdown">
					<a  class="dropdown-toggle" data-toggle="dropdown" href="#">Companies</a>
					<ul class="dropdown-menu">
					  <li><a href="#">Find Companies</a></li>
					  <li><a href="#">Companies You Follow</a></li>
					</ul>
				  </li>
				  <li class="dropdown">
					<a  class="dropdown-toggle" data-toggle="dropdown" href="#">News</a>
					<ul class="dropdown-menu">
					  <li><a href="#">Press</a></li>
					  <li><a href="#">Saved Articals</a></li>
					</ul>
				  </li>
				  <li class="dropdown">
					<a  class="dropdown-toggle" data-toggle="dropdown" href="#">More</a>
					<ul class="dropdown-menu">
					  <li><a href="#">Help Center</a></li>
					  <li><a href="#">Skills and Expertise</a></li>
					  <li><a href="#">Upgrade Your Account</a></li>
					</ul>
				  </li>
				</ul>
			  </div>	
		  </div>	  					
		</div>
		
   </div>	
   <!-- ---------menu -->