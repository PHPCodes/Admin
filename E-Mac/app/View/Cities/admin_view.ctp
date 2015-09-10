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
        <span class="pageTitle"><span class="icon-screen"></span>City Management</span>
       <ul class="quickStats">
            <li>
               <a href="" class="blueImg"><img src="<?php echo $this->webroot; ?>images/icons/mainnav/city8.png" alt="" /></a>
				
				 <div class="floatR"><strong class="blue"><?php echo count($cities);?></strong><span>City</span></div>
                <div class="floatR"></div>
            </li>
        </ul>
    </div>
     <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'admin_dashboard')); ?>">Dashboard</a></li>
				 <li><a href="<?php echo $this->Html->url(array('controller'=>'cities','action'=>'admin_index')); ?>">City Management</a></li>
                 <li class="current"><a href="javascript:void:(0)">View City</a></li>
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
        <div class="whead"><h6>View city</h6></div>
        <div id="dyn" class="hiddenpars">
      
			 
				 <div class="formRow">
                    <div class="grid3"><label>Name:</label></div>
                    <div class="grid9">
					<?php echo  $city['City']['name'];  ?>    
					</div>
                </div> 
				
				 <div class="formRow">
                    <div class="grid3"><label>Image:</label></div>
                    <div class="grid9">
							<?php echo $this->Html->image(FULL_BASE_URL.$this->webroot.'files/cities/'.$city['City']['image'],array('width'=>'100')); ?>
					</div>
                </div> 
 
 				 <div class="formRow">
                    <div class="grid3"><label>Status:</label></div>
                    <div class="grid9">
					<?php if(@$city['City']['status']) { echo  "Activated";  } else { echo  "Deactivated"; } ?>    
					</div>
                </div> 	
				
				 <div class="formRow">
                    <div class="grid3"><label>Created:</label></div>
                    <div class="grid9">
							<?php echo  $city['City']['created'];  ?>    
					</div>
                </div> 
				
				 <div class="formRow">
                    <div class="grid3"><label>Modified:</label></div>
                    <div class="grid9">
							<?php echo  $city['City']['modified'];  ?>    
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



      