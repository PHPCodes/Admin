<?php echo $this->element("admin_header"); ?>
<?php echo $this->element("admin_topright"); ?>
<?php echo $this->element("admin_nav"); ?>
<?php echo $this->element("admin_sidebar"); 
?> 

<style>
    .imag_con{
        float: left;
        width: 74%;
        height: auto;
    }
</style>
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-screen"></span>Restaurant Management</span>
        <ul class="quickStats">
            <li>
               <a href="" class="blueImg"><img src="<?php echo $this->webroot; ?>images/icons/mainnav/restaurantGREY.png" alt="" /></a>
				
				 <div class="floatR"><strong class="blue"><?php echo count($restCount);?></strong><span>Brands</span></div>
                <div class="floatR"></div>
            </li>
        </ul>
    </div>
     <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'admin_dashboard')); ?>">Dashboard</a></li>
				 <li><a href="<?php echo $this->Html->url(array('controller'=>'restaurants','action'=>'admin_index')); ?>">Restaurant Management</a></li>
                 <li class="current"><a href="javascript:void:(0)">View Restaurant</a></li>
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
        <div class="whead"><h6>View restaurant</h6></div>
        <div id="dyn" class="hiddenpars">
				 <div class="formRow">
                    <div class="grid3"><label>Name:</label></div>
                    <div class="grid9">
					<?php echo  $restaurant['Restaurant']['name'];  ?>    
					</div>
                </div> 
				
				 <div class="formRow">
                    <div class="grid3"><label>Image:</label></div>
                    <div class="grid9">
							<?php echo $this->Html->image(FULL_BASE_URL.$this->webroot.'files/restaurants/'.$restaurant['Restaurant']['image'],array('width'=>'100')); ?>
					</div>
                </div> 
 
				 <div class="formRow">
                    <div class="grid3"><label>City:</label></div>
                    <div class="grid9">
					<?php echo  $restaurant['City']['name'];  ?>    
					</div>
                </div>  

				 <div class="formRow">
                    <div class="grid3"><label>Video Thumb:</label></div>
                    <div class="grid9 ">
					<a  style="display: inline-block; text-align:center; position: relative;" href="<?php echo FULL_BASE_URL.$this->webroot.'files/restaurants/video/'.$restaurant['Restaurant']['video']; ?>"  target="_blank"><img src="<?php echo  FULL_BASE_URL.$this->webroot.'files/restaurants/video/video-thumb/'.$restaurant['Restaurant']['video_thumb'];  ?>"  width="100">
					<div class="videos"></div></a>
					</div>
                </div> 

				 <div class="formRow">
                    <div class="grid3"><label>Address:</label></div>
                    <div class="grid9">
					<?php echo  $restaurant['Restaurant']['address'];  ?>    
					</div>
                </div> 
				
				 <div class="formRow">
                    <div class="grid3"><label>Contact:</label></div>
                    <div class="grid9">
					<?php echo  $restaurant['Restaurant']['contact'];  ?>    
					</div>
                </div> 				

				 <div class="formRow">
                    <div class="grid3"><label>Reservation:</label></div>
                    <div class="grid9">
					<?php echo  $restaurant['Restaurant']['reservation'];  ?>    
					</div>
                </div> 

				 <div class="formRow">
                    <div class="grid3"><label>Menu:</label></div>
                    <div class="grid9">
					<?php echo  $restaurant['Restaurant']['menu'];  ?>    
					</div>
                </div> 

				 <div class="formRow">
                    <div class="grid3"><label>Description:</label></div>
                    <div class="grid9">
					<?php echo  $restaurant['Restaurant']['description'];  ?>    
					</div>
                </div> 		

				 <div class="formRow">
                    <div class="grid3"><label>Restaurant on Map:</label></div>
                    <div class="grid9">
					<div id="googleMap" style="width:350px;height:320px;"></div>
					</div>
                </div> 		
				

				 <div class="formRow">
                    <div class="grid3"><label>Status:</label></div>
                    <div class="grid9">
					<?php if(@$restaurant['Restaurant']['status']) { echo  "Activated";  } else { echo  "Deactivated"; } ?>    
					</div>
                </div> 	

				 <div class="formRow">
                    <div class="grid3"><label>Created:</label></div>
                    <div class="grid9">
					<?php echo  $restaurant['Restaurant']['created'];  ?>    
					</div>
                </div> 	

				 <div class="formRow">
                    <div class="grid3"><label>Modified:</label></div>
                    <div class="grid9">
					<?php echo  $restaurant['Restaurant']['modified'];  ?>    
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



      