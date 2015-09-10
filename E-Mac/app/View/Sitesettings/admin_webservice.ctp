<?php echo $this->element("admin_header"); ?>
<?php echo $this->element("admin_topright"); ?>
<?php echo $this->element("admin_nav"); ?>
<?php echo $this->element("admin_sidebar"); ?> 
<style type="text/css">
.formRow {
    border-bottom: 1px solid #5F5F5F;
}
pre{
box-shadow : 5px 5px 5px 5px;
}
</style>
<!--------------------------->
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-screen"></span>Web-services</span>
    </div>
     <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'admin_dashboard')); ?>">Dashboard</a></li>
                <li class="current"><a href="<?php echo $this->Html->url(array('controller'=>'sitesettings','action'=>'webservice')); ?>">Web-services</a></li>
            </ul>
        </div>
    </div>
    
    <!-- Main content -->
    <div class="wrapper">
    <?php $x=$this->Session->flash(); ?>
         <?php if($x){ ?>
        <div class="nNote nSuccess" id="flash">
         <div class="" style="text-align:center" ><?php echo $x; ?></div> 
         </div>                
        <?php } ?>
         <div class="widget check grid6">
        <div class="whead"><h6>Web-services</h6></div>
        <div id="dyn" class="hiddenpars">
<!----------------------------------------------------------------------------------->

<div class="formRow">                 
   
	<pre>	  
             1. Citylist : http://dev414.trigma.us/scopeout/Webservices/citylist
         </pre>       
   
 </div>

<div class="formRow">                  
   
     <pre>
	2. Screen background : http://dev414.trigma.us/scopeout/Webservices/screen?screen=1
           Note : Pass 1 for first screen,2 for second screen,3 for third screen
   </pre>
   
 </div>


<div class="formRow">                  
   
       <pre>
         3. Restaurant List Webservices : http://dev414.trigma.us/scopeout/Webservices/restaurantlist?city_id=5
      </pre>
    
 </div>





<div class="formRow">                  
    
      <pre>
         4. Restaurant details page webservices :http://dev414.trigma.us/scopeout/Webservices/restaurantdetails?restaurant_id=2
      </pre>
    
 </div>


<div class="formRow">                  
    
      <pre>
         5. All Nears Restaurant webservices :http://dev414.trigma.us/scopeout/Webservices/nearby?lat=42.357619&long=-71.062791
      </pre>
    
 </div>


<!---------------------------------------------------------------------------------------->     
        </div>  
          
        </div>        
    </div>
</div>

      































