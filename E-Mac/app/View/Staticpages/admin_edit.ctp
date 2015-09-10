<?php echo $this->element("admin_header"); ?>
<?php echo $this->element("admin_topright"); ?>
<?php echo $this->element("admin_nav"); ?>
<?php echo $this->element("admin_sidebar"); ?> 
<?php echo $this->Html->script(array('tiny_mce/tiny_mce'))?>
<script type="text/javascript">
jQuery(document).ready(function(){
tinyMCE.init({
theme: "advanced",
plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
// Theme options
theme_advanced_buttons1 : ",justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
theme_advanced_buttons2 : "cut,copy,paste|,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,image,cleanup,code,|,forecolor,backcolor",
theme_advanced_buttons3 : "tablecontrols,|sub,sup,|,charmap,emotions,iespell,media,advhr,|,fullscreen",
theme_advanced_buttons4 : "bold,italic,underline,strikethrough,|styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,|,insertimage",
theme_advanced_toolbar_location : "top",
theme_advanced_toolbar_align : "left",
theme_advanced_statusbar_location : "bottom",
theme_advanced_resizing : true,
mode: "exact",
elements: "conta",
body_id: "conta"
});
});

        
        </script>
<!--------------------------->
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-screen"></span>StaticPages Management</span>
    </div>
     <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'admin_dashboard')); ?>">Dashboard</a></li>
                <li><a href="<?php echo $this->Html->url(array('controller'=>'Staticpages','action'=>'admin_index')); ?>">StaticPages Management</a></li>
                 <li class="current"><a href="javascript:void:(0)">Edit StaticPage</a></li>
            </ul>
        </div>
    </div>
    
    <!-- Main content -->
    <div class="wrapper">

    	<!-- Chart -->
 
            
         <div class="widget fluid">
        <div class="whead"><h6>Edit StaticPage</h6></div>
        <div id="dyn" class="hiddenpars">
             <?php echo $this->Form->create('Staticpage'); ?>
                 <div class="formRow">
                    <div class="grid3"><label>Title:</label></div>
                    <div class="grid9">
                    <?php echo $this->Form->input('title', array('label'=>"",'type'=>'text','readonly'));?>
                    </div>
                </div>
                
                <div class="formRow">
                    <div class="grid3"><label>Content:</label></div>
                    <div class="grid9">
                    <?php echo $this->Form->input('content', array('label'=>"",'type'=>'textarea','id'=>'conta','rows'=>"",'cols'=>"16"));?>
                    </div>
                </div> 
               
                <div class="formRow">
                    <div class="grid3"><label></label></div>
                    <div class="grid9">
                    <button type="submit" name="Save" id="update" class="buttonS bLightBlue" >Save</button>
                    </div>
                </div>
           </form>
     
        </div>  
          
        </div>        
    </div>
</div>

      