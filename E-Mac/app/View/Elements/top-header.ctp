   <?php echo $this->Html->script('twitter-bootstrap-hover-dropdown.min'); ?>
<style>
    a:hover{text-decoration: none;}
    .drop{border: 3px solid gray;}
    .notification{border: 3px solid gray;}
    .notification li a:hover{background-color: #D6DF21;}
</style>
<div class="container-fluid" style="margin:0px; padding:0px; overflow:auto;">
    <div class="row-fluid" style="background-color:#58595b;border-bottom:5px solid white;">
        <!-- first -->
        <div class="span8">
            <div class="span4">
                <?php if($user_id){ ?>
                <a href="http://academatch.net/Home"><?php echo $this->Html->image('ss_44.png'); ?></a> 
                <?php }else{ ?>
                  <a href="http://academatch.net"><?php echo $this->Html->image('ss_44.png'); ?></a> 
                <?php } ?>
           </div>
            <div style="padding-top:20px;float:right;margin-right:150px;font-family:Arial;" class=" span4 visible-desktop" id="login" >				
                <h4>MATCHING ACADEMICS</h4>
                <h4>WITH COMPANIES AND</h4>
                <h4>LIKE-MINDED PEOPLE</h4>
            </div>
            <div class="visible-desktop"></div>
        </div>
        <!--first end -->
        <!--right -->
        <?php if ($user_id) { ?>
            <div class="span4" id="hide">
                <div class="span12" id="loginbg" >  
                    <div class="navbar" style="margin-bottom:0px;"> 
                        <div class="navbar-inverse" id="loginbg" >                           
                            <ul class="nav">
                                <li class="dropdown">
                                    <a  class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" href="#">Welcome<strong>&nbsp;&nbsp;<?php echo $username; ?></strong></a>
                                    <ul class="dropdown-menu drop" >
                                        <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'setting')); ?>">Settings</a></li>
                                        <li><a href="<?php echo $this->Html->url(array('controller' => 'plans', 'action' => 'subscription')); ?>">Upgrade Your Account</a></li>
                                        <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout')); ?>">Logout</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"> 
                                  <a   href="/Inboxes/inbox"><span class="badge" style="color:black;background-color:white;margin:-10px 0px 10px 2px;"><i class="icon icon-envelope"></i>&nbsp;(<?php echo count($msgs); ?>)&nbsp;mails</span></a>
                                   
                                </li>
                            </ul>
                         </div>	
                    </div>	
                    <div class="span12" id="ui">
                        <!--		    <div class="span6"> Account Type&mdash;<b>Basic</b> &rlm; <a href="#">Add Connections</a> </div>-->
                        <div class="span6">
                         <!-- <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'invite')); ?>">Add Connections</a>-->
                        </div> 	

                    </div>  					
                </div>


            </div>  

        </div>
    <?php } else { ?>
        <div class="span4" id="hide" style="margin:0px;">
            <div class="span12" id="loginbg">
                <div style="margin-left:20px; padding-top:5px; padding-bottom:20px;">
                    <p style=" letter-spacing:2px;font-size:15px; line-height:16px; color:#CCC">ALREADY A MEMBER?</p>
                    <p>
                    <form id="frmlogin2" action="/users/login" method="post">
                        <input name="data[User][username]" style="width: 125px !important; " placeholder="Username or E-mail Address" type="text" />
                        <input name="data[User][password]" style="width: 110px !important; " placeholder="Password" type="password" />
                        <button style="margin-top: -10px;" type="submit" class="btn">Sign In</button> 
                       <!-- <span style="color: #fff; margin-top: -10px;">or</span> 
                        <a href="http://www.facebook.com/dialog/oauth?
                           client_id=479754455411339&
                           redirect_uri=http://linked.apnaphp.com/Loginwith/login&
                           state=<?php echo $csrfToken; ?>&
                           scope=email"><?php echo $this->Html->image("socialico03_09.png", array('style' => 'height:30px; margin-top: -10px;')); ?></a> -->
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
    <?php if ($user_id) { ?>
        
        <div class="row-fluid" style="border-bottom:0px solid white; height: 48px;">
            <!-- first -->
            <!--<div class="span8">-->
                <div class="navbar">
                    <div class="navbar-inner">
                        <ul class="nav pull-right" style=" float: left !important; margin-left: 13px; !important;">
                            <li><a href="/Home">Home</a>
                               <!-- <ul class="dropdown-menu">
                                    <li><a href="<?php echo $this->Html->url(array('controller' => 'ads', 'action' => 'index')) ?>">Advertise With Us</a></li>
                                </ul>-->
                            </li>
                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" href="/postJobs/find_job" >Posts</a>
                                <ul class="dropdown-menu drop">
                                    <li><a href="<?php echo $this->Html->url(array('controller' => 'postJobs', 'action' => 'find_job')); ?>">Search Posts</a></li>
                                 <li><a href="<?php echo $this->Html->url(array('controller' => 'postJobs', 'action' => 'job_search')); ?>">Saved Posts</a></li>	
                                 <li><a href="<?php echo $this->Html->url(array('controller' => 'postJobs', 'action' => 'job_search')); ?>">Applied For Posts</a></li>					 
                                  <?php if($ui['User']['add_post_grant'] == "1"){ ?>  <li><a href="<?php echo $this->Html->url(array('controller' => 'postJobs', 'action' => 'add')); ?>">Add a Post</a></li>  <?php } ?>					 
<!--                                    <li><a href="<?php //echo $this->Html->url(array('controller' => 'postJobs', 'action' => 'managejob')); ?>">Manage Post</a></li>-->					 
                                </ul>
                            </li>
                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" href="" >Grants</a>
                                <ul class="dropdown-menu drop">                                    
                                    <li><a href="<?php echo $this->Html->url(array('controller' => 'Grants', 'action' => 'find_grant')); ?>">Search Grants</a></li>
                                    <li><a href="<?php echo $this->Html->url(array('controller' => 'Grants', 'action' => 'grant_result')); ?>">Saved Grants</a></li>	
                                    <li><a href="<?php echo $this->Html->url(array('controller' => 'Grants', 'action' => 'grant_result')); ?>">Applied For Grants</a></li>
                                    <?php if($ui['User']['add_post_grant'] == "1"){ ?>
                                    <li><a href="<?php echo $this->Html->url(array('controller' => 'Grants', 'action' => 'add')); ?>">Add a Grant</a></li>
                                 	 <?php } ?>					 
<!--                                    <li><a href="<?php //echo $this->Html->url(array('controller' => 'postJobs', 'action' => 'managejob')); ?>">Manage Grant</a></li>					 -->
                                </ul>
                            </li>
                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000"  href="#">Group</a>
                                <ul class="dropdown-menu drop">
                                    <li><a href="<?php echo $this->Html->url(array('controller' => 'UserGroups', 'action' => 'index')); ?>">My Groups</a></li>
                                    <li><a href="<?php echo $this->Html->url(array('controller' => 'UserGroups', 'action' => 'group_add')); ?>">Create a Group</a></li>
<!--                                    <li><a href="<?php //echo $this->Html->url(array('controller' => 'UserGroups', 'action' => 'othergroup')); ?>">Group you may Like</a></li>-->
                                   
                                    <?php //foreach ($group as $gp): if ($gp['UserGroup']['user_id'] == $user_id) { ?>
<!--                                            <li><a href="<?php echo $this->Html->url(array('controller' => 'UserGroups', 'action' => 'home_group', $gp['UserGroup']['group_name'])); ?>"><?php echo $gp['UserGroup']['group_name']; ?></a></li>-->
                                        <?php //} endforeach; ?>
                                </ul>
                            </li>
                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000"  href="#">Profile</a>
                                <ul class="dropdown-menu drop">
                                    <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'profile', $user_id)); ?>">Edit my Profile</a></li>
                                    <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'profile_view', $user_id)); ?>">View my Profile</a></li> 
                                        <?php if($ui['User']['profile'] == "1"){ ?>
                                    <li><a href="<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'profile_search')); ?>">Search Profiles </a></li>
                                 	 <?php } ?>
<!--                                    <li><a href="<?php //echo $this->Html->url(array('controller' => 'recommendations', 'action' => 'recommendation')); ?>">Recommendation</a></li>  -->
<!--                                    <li><a href="<?php //echo $this->Html->url(array('controller' => 'users', 'action' => 'profile_organizer')); ?>">Profile Organizer</a></li>  -->
<!--                                    <li><a href="<?php //echo $this->Html->url(array('controller' => 'Albums', 'action' => 'add')); ?>">Create Album</a></li>  -->
                                </ul>
                            </li>
                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"  data-hover="dropdown" data-delay="1000"  href="#">Mail</a>
                                <ul class="dropdown-menu drop">
                                    <!-- <li><a href="<?php echo $this->Html->url(array('controller' => 'inboxes', 'action' => 'inbox')); ?>">Accept Invitations</a></li> -->
                                    <li><a href="<?php echo $this->Html->url(array('controller' => 'inboxes', 'action' => 'inbox')); ?>">View Messages</a></li>
                                    <li><a href="<?php echo $this->Html->url(array('controller' => 'inboxes', 'action' => 'inbox')); ?>">Compose a Message</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000"  href="/companies/search">Organisations</a> 
                                <ul class="dropdown-menu drop">
                                    <li><a href="<?php echo $this->Html->url(array('controller' => 'companies', 'action' => 'search')); ?>">Search Organisations</a></li>
                                      <?php if($ui['User']['add_company'] == "1"){?><li><a href="<?php echo $this->Html->url(array('controller' => 'companies', 'action' => 'add')); ?>">Add an Organisation</a></li><?php } ?>
<!--                                    <hr/>-->
                                    <?php foreach ($mycompany as $cmp): if ($cmp['Company']['user_id'] == $user_id) { ?>
                                            <li><a href="<?php echo $this->Html->url(array('controller' => 'Companies', 'action' => 'view', $cmp['Company']['company_name'])); ?>"><?php echo $cmp['Company']['company_name']; ?></a></li>
                                        <?php } endforeach; ?>
                                </ul>
                            </li>
                               <li><a href="/NewsArticles/index">News and Features</a>
<!--                               <li><a href="/Features/index">Advice</a>
                               <li class="dropdown"><a  class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000"   href="#" >More</a>
                                <ul class="dropdown-menu drop">
                                    <li><a href="/Ads/index">Advertise on Academatch</a></li>
                                    <li><a href="/events/index">My Events</a></li>
                                    <li><a href="/LearnMores/index">Help Center</a></li>
                                </ul>
                               </li>-->
                        </ul>
                    </div>
                </div>
            <!--</div>	
            <!--first end -->
            <!--right -->
            <!--<div class="span4" id="hide">
                <div class="span10">
                    <div class="input-append" style="margin: 10px 0px 5px 20px;">
                        <?php echo $this->Form->create('User', array('type' => 'post', 'action' => 'profile_search', 'id' => 'com_post', 'class' => "form-search")); ?>
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
            </div>-->  
        <?php } ?>
    </div>
<br/>
    <script>
        $(function() {
            // Setup drop down menu
            $('.dropdown-toggle').live('onmouseover',function(e){ $('.dropdown-toggle').dropdown();})
 
            // Fix input element click problem
            $('.dropdown input, .dropdown label').hover(function(e) {
                e.stopPropagation();
            });
        });
        $('.mypopover').popover({  
            content: function(ele) { return $('#popover-content').html(); }
        });
   
    </script>