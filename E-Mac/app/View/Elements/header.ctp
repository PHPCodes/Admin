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
                <a href="http://academatch.net"><?php echo $this->Html->image('ss_44.png'); ?></a> 
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
    
        <div class="span4" id="hide" style="margin:0px;">
            <div class="span12" id="loginbg">
                <div style="margin-left:20px; padding-top:5px; padding-bottom:20px;">
                    <p style=" letter-spacing:2px;font-size:15px; line-height:16px; color:#CCC">ALREADY A MEMBER?</p>
                    <p>
                    <form id="frmlogin2" action="/users/login" method="post">
                        <input name="data[User][username]" style="width: 125px !important; " placeholder="Username or Email" type="text" title="Choose a username or email Address"/>
                        <input name="data[User][password]" style="width: 110px !important; " placeholder="Password" type="password" title="Choose a password"/>
                        <button style="margin-top: -10px;" type="submit" class="btn">Sign In</button> 
                       <!-- <span style="color: #fff; margin-top: -10px;">or</span> 
                        <a href="http://www.facebook.com/dialog/oauth?
                           client_id=479754455411339&
                           redirect_uri=http://linked.apnaphp.com/Loginwith/login&
                           state=<?php echo $csrfToken; ?>&
                           scope=email"><?php echo $this->Html->image("socialico03_09.png", array('style' => 'height:30px; margin-top: -10px;')); ?></a> -->
               <p><a href="/Users/forgetpassword" style="color:white;">Forgot password?</a></p>
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
    </div>
