<?php echo $this->element("admin_header"); ?>
<?php echo $this->element("admin_topright"); ?>
<?php echo $this->element("admin_nav"); ?>
<?php echo $this->element("admin_sidebar"); ?>    
<!-- Content begins -->
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-screen"></span>Dashboard</span>
        
    </div>
    
    <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li class="current"><a href="">Dashboard</a></li>
            </ul>
        </div>
        
        <div class="breadLinks">
            
        </div>
    </div>
    
    <!-- Main content -->
    <div class="wrapper">
     <?php $x=$this->Session->flash(); ?>
         <?php if($x){ ?>
        <div class="nNote nSuccess" id="flash">
         <div class="alert alert-success" style="text-align:center" > <?php echo $x; ?></div> 
         </div>                
        <?php } ?>
        
        <ul class="middleNavA">
            <li><a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'admin_index')); ?>" title="User List" class="tool-tip" >
             <?php echo $this->Html->image('../images/elements/loaders/1.gif'); ?><?php //echo $this->Html->image('../images/icons/color/hire-me.png'); ?>
            <span><?php echo count($use_count); ?><br/>Users</span></a></li>  

            <li><a href="<?php echo $this->Html->url(array('controller'=>'Bars','action'=>'admin_index')); ?>" title="User List" class="tool-tip" >
             <?php echo $this->Html->image('../images/elements/loaders/3.gif'); ?><?php //echo $this->Html->image('../images/icons/color/hire-me.png'); ?>
            <span><?php echo count($Bar); ?><br/>Bars</span></a></li>         

                			
        </ul> 
    
    	<!-- Chart -->
        <div class="widget chartWrapper">
            <?php //debug($users); ?>
            <script lang="javascript" type="text/javascript">
        $(document).ready(function () {
            $('#jqChart').jqChart({
                title: { text: 'User Graph' },
                tooltips: { type: 'shared' },
                animation: { duration: 1 },
                series: [
                            {
                                type: 'line',
                                title: 'User',
                                data: [<?php $series = ""; foreach($users as $k){ $series .=  '[\''.$k['User']['register_date'].'\','.$k[0]['graphs'].'],'; } echo rtrim($series,",")?>]
                            }
                        ]
            });
            $(function() {
	$(".newsticker-jcarousellite").jCarouselLite({
		vertical: true,
		hoverPause:true,
		visible: 6,
		auto:500,
		speed:3000
	});
});
        });
        
    </script>
            <div class="body">
                <div class="chart">
                    <div id="jqChart"></div>
                </div>
            </div>
      </div>

   </div>
  </div> 
<?php echo $this->Html->script(array("jquery.form")); ?>
