<?php echo $this->element("admin_header"); ?>
<?php echo $this->element("admin_topright"); ?>
<?php echo $this->element("admin_nav"); ?>
<?php echo $this->element("admin_sidebar"); ?> 
<style>
.select-seat > span {
  float: left;
  margin: 6px 5px 6px 0;
}
.select-seat {
    margin: 3px 5px;
}
</style>
<link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>css/rest-layout.css" />
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/base/jquery-ui.css"/>
		<script type="text/javascript">
			var redipsURL = '/javascript/drag-and-drop-content-shift/';
		</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
/*
$(document).ready(function(){
    $("#0").click(function(){
	var offset = $(this).offset();
            var xPos = offset.left;
            var yPos = offset.top;
			alert('pos x ' + xPos + 'pos y ' +yPos);	
	});	
    $("#1").click(function(){
	var offset = $(this).offset();
            var xPos = offset.left;
            var yPos = offset.top;
			alert('pos x ' + xPos + 'pos y ' +yPos);	
	});	
}); */
</script>		
<!--script>
 var offset = $("#0").offset();
            var xPos = offset.left;
            var yPos = offset.top;
			console.log('pos x ' + xPos + 'pos y ' +yPos);	
</script-->		
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-screen"></span>Restaurant Layout Management</span>
        <ul class="quickStats">
            <li>
               <?php //echo $this->Html->image("../images/icons/quickstats/user.png", array('url' => array('controller' => 'users', 'action' => 'index'))); ?>
             <a href="javascript:void();" class="blueImg"><?php echo $this->Html->Image('../images/icons/mainnav/restaurantGREY.png'); ?></a>

                <div class="floatR"><strong class="blue"><?php // echo count($restCount); ?></strong><span>Restaurant Layout</span></div>
            </li>
    </div>
     <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'admin_dashboard')); ?>">Dashboard</a></li>
                <li class="current"><a href="<?php echo $this->Html->url(array('controller'=>'restaurants','action'=>'admin_index')); ?>">Restaurant Layout Management</a></li>
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
                   
        <!--ul class="middleNavR">
           <li><a href="<?php echo $this->Html->url(array('controller'=>'restaurants','action'=>'admin_add')); ?>" title="Add Restaurant"  class="tool-tip"><?php echo $this->Html->Image('/images/icons/middlenav/add.png'); ?></a></li>
        </ul-->    
    	<!-- Chart -->
   
       <div class="widget check grid6">
        <div class="whead">
      <!--span class="titleIcon">
        <input title="Select All" class="tool-tip" id="titleCheck" name="titleCheck" type="checkbox">
	  </span-->
     <h6>Restaurant Layout Management</h6>  
        </div>
        <div id="dyn" class="hiddenpars">
		<?php echo $this->Form->create('Restaurant',array('id'=>'','type'=>'file')); ?>
		<!-- drag container -->
		<div id="redips-drag">
			<!-- table1 -->
			<table id="table1">
				<colgroup>
					<col width="100"/>
					<col width="100"/>
					<col width="100"/>
				</colgroup>
				<tbody>
					<tr>
						<td class="redips-mark"><div class="redips-drag redips-clone orange">T</div></td>
						<!-- trash cell -->
						<td class="redips-trash trash" colspan="3">Trash</td>
						
					</tr>
					
				</tbody>
			</table>
			<!-- table2 -->
			<table id="table2">
				<colgroup>
					<col width="100"/>
					<col width="100"/>
					<col width="100"/>
				</colgroup>
				<tbody>
					<?php   $j=1; for($i=0; $i<=29; $i++) { ?>
						<?php if($j == 1){ echo '<tr>'; } ?>
							<td <?php if(isset($i) && $i=='29')  { echo "id='lastCell'"; } ?>><?php if(isset($layouts[$i]['Layout']['position']) && $layouts[$i]['Layout']['position']== $i) { echo '<div class="redips-drag orange" style="border-style: solid; cursor: move;" id="'.$i.'">T</div>';}  ?></td>
						<?php if($j ==5){ echo '</tr>'; } ?>
					<?php  if($j==5){ $j=1; } else { $j++; }  } ?>			
				</tbody>
			</table>
		</div>
		<div id="dialog" title="jQuery dialog">
			<div class="select-seat">
				<span> <label type="seat">Select Seats : </label> </span>
					<select name="seat" id="seat">
						<?php for($i=1;$i<=25;$i++) { ?>
							<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php } ?>
					</select>
			</div>	
		</div>
		<button type="submit" name="Save" id="update" class="buttonS bLightBlue" >Save</button>
		</form>
        </div>  		
        </div>        
    </div>
</div>
</div>
<script type="text/javascript" src="<?php echo $this->webroot; ?>js/layout-script.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>js/redips-drag-min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>