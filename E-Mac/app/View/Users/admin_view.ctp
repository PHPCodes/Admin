<?php echo $this->element("admin_header"); ?>
<?php echo $this->element("admin_topright"); ?>
<?php echo $this->element("admin_nav"); ?>
<?php echo $this->element("admin_sidebar"); 
?> 

<script type="text/javascript">
$(document).ready(function(){
$(".fancybox").fancybox();
});
</script>
<style>
    .imag_con{
        float: left;
        width: 74%;
        height: auto;
    }
</style>
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-screen"></span>User Management</span>
        <ul class="quickStats">
            <li>
               <a href="" class="blueImg"><img src="<?php echo $this->webroot; ?>images/icons/quickstats/user.png" alt="" /></a>
				
				 <div class="floatR"><strong class="blue"></strong><span>User</span></div>
                <div class="floatR"></div>
            </li>
        </ul>
    </div>
     <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'admin_dashboard')); ?>">Dashboard</a></li>
				 <li><a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'admin_index')); ?>">User Management</a></li>
                 <li class="current"><a href="javascript:void:(0)">View User</a></li>
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
      <div class="widget fluid">
        <div class="whead"><h6>View User</h6></div>
        <div id="dyn" class="hiddenpars">
				 <div class="formRow">
                    <div class="grid3"><label>Profile Picture:</label></div>
                    <div class="grid9">
							<a class="fancybox" rel="group" href="<?php echo $this->webroot.'files/profileimage/'.$user['User']['profile_image']; ?>">
								<img src="<?php echo $this->webroot.'files/profileimage/'.$user['User']['profile_image']; ?>" height="150" width="150" alt=""  />
							</a>
					</div>
                </div>
				<div class="formRow">
                    <div class="grid3"><label>	<?php if ($user['User']['username'] != '') {
						echo 'User Name';
					}  else  {
					
					echo 'Company Name';
					}?>   </label></div>
                    <div class="grid9">
					<?php if ($user['User']['username'] != '') {
						echo $user['User']['username'];
					}  else  {
					
					echo $user['User']['company_name'];
					}?>    
					</div>
                </div> 
				
				
				
				 <div class="formRow">
                    <div class="grid3"><label>Email:</label></div>
                    <div class="grid9">
							<?php echo  $user['User']['email'];  ?>
					</div>
                </div>
				 <div class="formRow">
                    <div class="grid3"><label> Contact Number: </label></div>
                    <div class="grid9">
					<?php echo  $user['User']['contact'];  ?>    
					</div>
                </div>  

				
				 <div class="formRow">
                    <div class="grid3"><label>Status:</label></div>
                    <div class="grid9">
					<?php if(@$user['User']['status']) { echo  "Activated";  } else { echo  "Deactivated"; } ?>    
					</div>
                </div> 	

				 <div class="formRow">
                    <div class="grid3"><label>Created:</label></div>
                    <div class="grid9">
					<?php echo  $user['User']['register_date'];  ?>    
					</div>
                </div> 	

				 <div class="formRow">

                </div> 					
				
        </div>  
          
        </div>        
    </div>
</div>

<style>
.list-img {
    float: left;
    width: 100%;
}
    
.list-img > ul {
    float: left;
    margin: 0;
}
li.imgsd:nth-child(4n){margin-right:0px;
     }
     


.imgsd .tablectrl_small.bDefault.tipS.tool-tip {
    background: none repeat scroll 0 0 #000000;
    border: medium none;
    bottom: 8px;
    box-shadow: none;
    color: #FFFFFF;
    float: left;
    font-size: 12px;
    padding: 6px;
    position: absolute;
    right: 8px;
    text-decoration: none;
}

li.imgsd {
    background: none repeat scroll 0 0 #EFEFEF;
    border: 1px solid #CCCCCC;
    border-radius: 10px 10px 10px 10px;
    float: left;
    margin: 0 32px 22px 0;
    padding: 8px;
    position: relative;
    width: 20%;
}
</style>
<script
src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">
</script>

<script>
var myCenter=new google.maps.LatLng(<?php echo  $restaurant['Restaurant']['lat'];  ?> ,<?php echo  $restaurant['Restaurant']['long'];  ?>);

function initialize()
{
var mapProp = {
  center: myCenter,
  zoom:5,
  mapTypeId: google.maps.MapTypeId.ROADMAP
  };

var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker = new google.maps.Marker({
  position: myCenter,
  title:'<?php echo  $restaurant['Restaurant']['name'];  ?>'
  });

marker.setMap(map);

// Zoom to 9 when clicking on marker
google.maps.event.addListener(marker,'click',function() {
  map.setZoom(9);
  map.setCenter(marker.getPosition());
  });
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>



      