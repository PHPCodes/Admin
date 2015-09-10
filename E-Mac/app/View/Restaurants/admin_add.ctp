<?php  echo $this->element("admin_header"); ?>
<?php echo $this->element("admin_topright"); ?>
<?php echo $this->element("admin_nav"); ?>
<?php echo $this->element("admin_sidebar"); ?> 
<?php echo $this->Html->script(array('tiny_mce/jquery.tinymce','tiny_mce/tiny_mce')); ?>

<script type="text/javascript">
tinyMCE.init({
        // General options
		editor_deselector : "mceNoEditor",
		editor_selector : "mceEditor",
        mode : "textareas",
        theme : "advanced",
        plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

        // Theme options
        theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
        theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,

        // Skin options
        skin : "o2k7",
        skin_variant : "silver",

        // Example content CSS (should be your site CSS)
        content_css : "css/example.css",

        // Drop lists for link/image/media/template dialogs
        template_external_list_url : "js/template_list.js",
        external_link_list_url : "js/link_list.js",
        external_image_list_url : "js/image_list.js",
        media_external_list_url : "js/media_list.js",

        // Replace values for the template plugin
        template_replace_values : {
                username : "Some User",
                staffid : "991234"
        }
});
</script>
<link href="http://dev414.trigma.us/scopeout/css/timepicki.css" rel="stylesheet">
<!--------------------------->
<div class="overlay" id="overlay" style="display:none;"></div>
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-screen"></span>Restaurant Management</span>
        <ul class="quickStats">
            <li>
               <?php // echo $this->Html->image("../images/icons/quickstats/restaurantGREY.png", array('url' => array('controller' => 'users', 'action' => 'index'))); ?>
             <a href="javascript:void();" class="blueImg"><?php echo $this->Html->Image('../images/icons/mainnav/restaurantGREY.png'); ?></a>
                <div class="floatR"><strong class="blue"><?php echo count($restCount); ?></strong><span>City</span></div>
            </li>
		</ul>	
    </div>
     <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'admin_dashboard')); ?>">Dashboard</a></li>
                <li><a href="<?php echo $this->Html->url(array('controller'=>'Restaurants','action'=>'admin_index')); ?>">Restaurant Management</a></li>
                 <li class="current"><a href="javascript:void:(0)">Add New Restaurant</a></li>
            </ul>
        </div>
    </div>
    <?php // debug($CityList); ?>
    <!-- Main content -->
    <div class="wrapper">
    <?php 
	
	$x=$this->Session->flash();if($x){ ?>
    <div class="nNote nSuccess" id="flash">
       <div class="alert alert-success" style="text-align:center" ><?php echo $x; ?></div>
     </div><?php } ?>
    	<!-- Chart -->
     <div class="widget fluid">
        <div class="whead"><h6>Add Restaurant</h6></div>
        <div id="dyn" class="hiddenpars">
             <?php echo $this->Form->create('Restaurant',array('action'=>'admin_add','id'=>'validate','type'=>'file','onsubmit'=>'return loaderChecking();')); ?>
                <div class="formRow">
                    <div class="grid3"><label>City Name :</label></div>
                    <div class="grid9">
					
					<?php 	
						echo $this->Form->input('cities', array(
						'id'      => 'cities',
						'label'	=> false,	
						'type'    => 'select',
						'options' => $CityList,
						'empty'   => 'Choose Types',
						'required'=>false
						));
					?>
                    </div>
                </div>
                <div class="formRow">
                    <div class="grid3"><label>Category Name :</label></div>
                    <div class="grid9">
						<select  placeholder="Select Category" class="commonSelect" id="category_id"  name="data[Restaurant][category_id]">
								<option value='' >Select Category</option>
						</select>
                    </div>
                </div>				
                <div class="formRow">
                    <div class="grid3"><label>Restaurant Name :</label></div>
                    <div class="grid9">
                    <?php echo $this->Form->input('name', array('label'=>"",'type'=>'text','class'=>'validate[required]','required'=>false));?>
                    </div>
                </div>
                
  
				<div class="formRow">
                    <div class="grid3"><label> Image :</label></div>
                    <div class="grid9">
						<?php echo $this->Form->input('image', array('label'=>"",'type'=>'file','class'=>'validate[required]','id'=>'fuPhoto','required'=>false));?>	
						<p><div id="myLabel" style="color:red;"></div></p>	
                    </div>
                </div> 

                <div class="formRow">
                    <div class="grid3"><label>Video Title :</label></div>
                    <div class="grid9">
                    <?php echo $this->Form->input('video_title', array('label'=>"",'type'=>'text','class'=>'validate[required]','required'=>false));?>
                    </div>
                </div>
				
                <div class="formRow">
                    <div class="grid3"><label>Video :</label></div>
                    <div class="grid9">
                    <?php echo $this->Form->input('video', array('label'=>"",'type'=>'file','id'=>'video','class'=>'','required'=>false));?>
					<p><em>Please choose .mov  and .mp4 video only.</em></p>
				     <p><div id="myLabel2" style="color:red;"></div></p>	
                    </div>
                </div>
				
                <div class="formRow">
                    <div class="grid3"><label>Address :</label></div>
                    <div class="grid9">
                    <?php echo $this->Form->input('address', array('label'=>"",'type'=>'textarea','class'=>'validate[required] mceNoEditor','required'=>false));?>
                    </div>
                </div>

                <div class="formRow">
                    <div class="grid3"><label>contact :</label></div>
                    <div class="grid9">
                    <?php echo $this->Form->input('contact', array('label'=>"",'type'=>'text','max-length'=>'20','class'=>'numeric','required'=>false));?>
					<span class="error" style="color: Red; display: none">* Input digits (0 - 9)</span>
                    </div>
                </div>
                <div class="formRow">
                    <div class="grid3"><label>Restaurant Open:</label></div>
                    <div class="grid9">
						 <?php echo $this->Form->input('open', array('label'=>"",'type'=>'text','id'=>'open','class'=>'validate[required]','required'=>false));?>
                    </div>
                </div>				
                <div class="formRow">
                    <div class="grid3"><label>Restaurant Closed :</label></div>
                    <div class="grid9">
						<?php echo $this->Form->input('closed', array('label'=>"",'type'=>'text','id'=>'closed','class'=>'validate[required]','required'=>false));?>
                    </div>
                </div>					
                <div class="formRow">
                    <div class="grid3"><label> Reservation :</label></div>
                    <div class="grid9">
                    <?php echo $this->Form->input('reservation', array('label'=>"",'type'=>'text','class'=>'validate[required]','required'=>false));?>
                    </div>
                </div>

                <div class="formRow">
                    <div class="grid3"><label>Menu :</label></div>
                    <div class="grid9">
                    <?php echo $this->Form->input('menu', array('label'=>"",'type'=>'text','class'=>'validate[required]','required'=>false));?>
                    </div>
                </div>

                <div class="formRow">
                    <div class="grid3"><label>Description :</label></div>
                    <div class="grid9">
                    <?php echo $this->Form->input('description', array('label'=>"",'type'=>'textarea','class'=>'validate[required] mceEditor','required'=>false));?>
                    </div>
                </div>
                <div class="formRow">
                    <div class="grid3"><label></label></div>
                    <div class="save_but">
                    <button type="submit" name="Save" id="update" class="buttonS bLightBlue" >Save</button>
                    </div>
					<div class="grid2">
                    <a href="<?php echo $this->webroot; ?>admin/restaurants/index" class="buttonS bLightBlue" >Cancel</a>
                    </div>
                </div>				
           </form>
     
        </div>  
          
        </div>        
    </div>
</div>
<script src="http://dev414.trigma.us/scopeout/js/jquery.min.js"></script>
<script src="http://dev414.trigma.us/scopeout/js/timepicki.js"></script>
<script src="http://dev414.trigma.us/scopeout/js/bootstrap.min.js"></script>
<script>
	$('#open').timepicki({start_time: ["10", "00", "AM"]});
	$('#closed').timepicki({start_time: ["11", "00", "PM"]});
</script>
<script type="text/javascript">
	$( "#cities" ).change(function() {
    	var cities = $( "#cities" ).val();
    	$("#cities option[value='0']").remove();

       	$.ajax({ url: "<?php echo Router::url(array('controller'=>'restaurants','action'=>'getCatList'),true); ?>/"+cities,        
         type: 'get',
         async: false,
         success:
         function(msg) {
         	$('#category_id').html(msg);
       	 }
        });
    //	$('#city').find('option').remove().end();
    //	$('#city').append('<option value="0">Please choose a Categories</option>');

	});
</script>
   <script type="text/javascript">
        var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        $(function () {
            $(".numeric").bind("keypress", function (e) {
                var keyCode = e.which ? e.which : e.keyCode
                var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
                $(".error").css("display", ret ? "none" : "inline");
                return ret;
            });
            $(".numeric").bind("paste", function (e) {
                return false;
            });
            $(".numeric").bind("drop", function (e) {
                return false;
            });
        });
		// $('#validate').validate();
    </script>
 <script type="text/javascript">
	$("#fname").keypress(function(e) {
			if(e.which < 97 /* a */ || e.which > 122 /* z */) {
			e.preventDefault();
			//return false;
	}
	});
			$("#lname").keypress(function(e) {
			if(e.which < 97 /* a */ || e.which > 122 /* z */) {
			e.preventDefault();
	}
	});

</script>
<script type="text/javascript">
   $(document).ready(function(){
       
	   jQuery.validator.addMethod("phoneUS", function(phone_number, element) {
    phone_number = phone_number.replace(/\s+/g, "");
    return this.optional(element) || phone_number.length > 9 &&
        phone_number.match(/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/);
		}, "Please specify a valid phone number");
	
	   $('#validate').validate();
	  
   });
</script>
<script type="text/javascript">
   $(document).ready(function(){
    //  $('#validate').validate();
      $('#fuPhoto').change(
            function () {
				//get the file size and file type from file input field
      		 var fsize = $('#fuPhoto')[0].files[0].size;
                 var fileExtension = ['jpeg', 'jpg','png','gif'];
                if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                    $('#myLabel').html("File must be '.png' , '.jpeg' , 'jpg' and 'gif' type,and max. 300KB size.");
					$(":submit").attr("disabled", true);
				}
				else if(fsize>307200){ 
					
					$('#myLabel').html("File must be less than 300KB");
					
					$(":submit").attr("disabled", true);
				}
								
				else if(fsize<=307200){ 
					
					$('#myLabel').html(" ");
					$(":submit").removeAttr("disabled");
				}
                else {
                    $('#myLabel').html(" ");
					$(":submit").removeAttr("disabled");
                }
						
            });
			
	     $('#video').change(
            function () {
				//get the file size and file type from file input field
      		 var fsize = $('#video')[0].files[0].size;
                var fileExtension = ['mov','mp4'];
                if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                    $('#myLabel2').html("Video must be '.mov' and 'mp4' type,and max. 15MB size.");
					$(":submit").attr("disabled", true);
				}
				else if(fsize>15728640){ 
					
					$('#myLabel2').html("File must be less than 15MB");
					$(":submit").attr("disabled", true);
				}
								
				else if(fsize<=15728640){ 
					
					$('#myLabel2').html(" ");
					$(":submit").removeAttr("disabled");
				}
                else {
                    $('#myLabel2').html(" ");
					$(":submit").removeAttr("disabled");
                }
						
            });  	
   });
</script>      
<script>

function show(target){

	document.getElementById(target).style.display = 'block';

}

function hide(target){

	document.getElementById(target).style.display = 'none';

}

function loaderChecking(){
		$("#overlay").show();
		return true;	
}
</script>
