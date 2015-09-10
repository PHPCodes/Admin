<?php echo $this->element("admin_header"); ?>
<?php echo $this->element("admin_topright"); ?>
<?php echo $this->element("admin_nav"); ?>
<?php echo $this->element("admin_sidebar"); ?>    
<!-- Content begins -->
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
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
    <?php $male_count=0;
          $female_count=0;  
          $male_count_jan=0;$m_jan_age=0;
          $female_count_jan=0;$f_jan_age=0;
          $male_count_feb=0;$m_feb_age=0;
          $female_count_feb=0;$f_feb_age=0;
          $male_count_mar=0;$m_mar_age=0;
          $female_count_mar=0;$f_mar_age=0;
          $male_count_apr=0;$m_apr_age=0;
          $female_count_apr=0;$f_apr_age=0;
          $male_count_may=0;$m_may_age=0;
          $female_count_may=0;$f_may_age=0;
          $male_count_june=0;$m_june_age=0;
          $female_count_june=0;$f_june_age=0;
          $male_count_july=0;$m_july_age=0;
          $female_count_july=0;$f_july_age=0;
          $male_count_aug=0;$m_aug_age=0;
          $female_count_aug=0;$f_aug_age=0;
          $male_count_sep=0;$m_sep_age=0;
          $female_count_sep=0;$f_sep_age=0;
          $male_count_oct=0;$m_oct_age=0;
          $female_count_oct=0;$f_oct_age=0;
          $male_count_nov=0;$m_nov_age=0;
          $female_count_nov=0;$f_nov_age=0;
          $male_count_dec=0;$m_dec_age=0;
          $female_count_dec=0;$f_dec_age=0;
          $i=0;
    foreach ($use_count as $key => $value) {
            $age=date('Y')-date('Y',strtotime($value['User']['dob']));
            
          if($value['User']['gender']=='Male')
          {
              $male_count++;
          }
          elseif ($value['User']['gender']=='Female') {
              $female_count++;
          }
          if(date('M',strtotime($value['User']['register_date']))=='Jan')
          {
              
              if($value['User']['gender']=='Male')
              {
                $male_count_jan++;
                $m_jan_age=$m_jan_age+$age;
                $m_jan_av=$m_jan_age/$male_count_jan;
              }
              elseif ($value['User']['gender']=='Female') {
                $female_count_jan++;
                $f_jan_age=$f_jan_age+$age;
                $f_jan_av=$f_jan_age/$female_count_jan;
              }
          }
          elseif(date('M',strtotime($value['User']['register_date']))=='Feb')
          {
              if($value['User']['gender']=='Male')
              {
                $male_count_feb++;
                $m_feb_age=$m_feb_age+$age;
                $m_feb_av=$m_feb_age/$male_count_feb;
              }
              elseif ($value['User']['gender']=='Female') {
                $female_count_feb++;
                $f_feb_age=$f_feb_age+$age;
                $f_feb_av=$f_feb_age/$female_count_feb;
              }
          }
          elseif(date('M',strtotime($value['User']['register_date']))=='Mar')
          {
              if($value['User']['gender']=='Male')
              {
                $male_count_mar++;
                $m_mar_age=$m_mar_age+$age;
                $m_mar_av=$m_mar_age/$male_count_mar;
              }
              elseif ($value['User']['gender']=='Female') {
                $female_count_mar++;
                $f_mar_age=$f_mar_age+$age;
                $f_mar_av=$f_mar_age/$female_count_mar;
              }
          }
          elseif(date('M',strtotime($value['User']['register_date']))=='Apr')
          {
              if($value['User']['gender']=='Male')
              {
                $male_count_apr++;
                $m_apr_age=$m_apr_age+$age;
                $m_apr_av=$m_apr_age/$male_count_apr;
              }
              elseif ($value['User']['gender']=='Female') {
                $female_count_apr++;
                $f_apr_age=$f_apr_age+$age;
                $f_apr_av=$f_apr_age/$female_count_apr;
              }
          }
          elseif(date('M',strtotime($value['User']['register_date']))=='May')
          {
              if($value['User']['gender']=='Male')
              {
                $male_count_may++;
                $m_may_age=$m_may_age+$age;
                $m_may_av=$m_may_age/$male_count_may;
              }
              elseif ($value['User']['gender']=='Female') {
                $female_count_may++;
                $f_may_age=$f_may_age+$age;
                $f_may_av=$f_may_age/$female_count_may;
              }
          }
          elseif(date('M',strtotime($value['User']['register_date']))=='Jun')
          {
              if($value['User']['gender']=='Male')
              {
                $male_count_june++;
                $m_june_age=$m_june_age+$age;
                $m_june_av=$m_june_age/$male_count_june;
              }
              elseif ($value['User']['gender']=='Female') {
                $female_count_june++;
                $f_june_age=$f_june_age+$age;
                $f_june_av=$f_june_age/$female_count_june;
              }
          }
          elseif(date('M',strtotime($value['User']['register_date']))=='Jul')
          {
              if($value['User']['gender']=='Male')
              {
                $male_count_july++;
                $m_july_age=$m_july_age+$age;
                $m_july_av=$m_july_age/$male_count_july;
              }
              elseif ($value['User']['gender']=='Female') {
                $female_count_july++;
                $f_july_age=$f_july_age+$age;
                $f_july_av=$f_july_age/$female_count_july;
              }
          }
          elseif(date('M',strtotime($value['User']['register_date']))=='Aug')
          {
              if($value['User']['gender']=='Male')
              {
                $male_count_aug++;
                $m_aug_age=$m_aug_age+$age;
                $m_aug_av=$m_aug_age/$male_count_aug;
              }
              elseif ($value['User']['gender']=='Female') {
                $female_count_aug++;
                 $f_aug_age=$f_aug_age+$age;
                $f_aug_av=$f_aug_age/$female_count_aug;
              }
          }
          elseif(date('M',strtotime($value['User']['register_date']))=='Sep')
          {
              
              if($value['User']['gender']=='Male')
              {
                $male_count_sep++;
                $m_sep_age=$m_sep_age+$age;
                $m_sep_av=$m_sep_age/$male_count_sep;
              }
              elseif ($value['User']['gender']=='Female') {
                $female_count_sep++;
                $f_sep_age=$f_sep_age+$age;
                $f_sep_av=$f_sep_age/$female_count_sep;
              }
          }
          elseif(date('M',strtotime($value['User']['register_date']))=='Oct')
          {
              if($value['User']['gender']=='Male')
              {
                $male_count_oct++;
                $m_oct_age=$m_oct_age+$age;
                $m_oct_av=$m_oct_age/$male_count_oct;
              }
              elseif ($value['User']['gender']=='Female') {
                $female_count_oct++;
                $f_oct_age=$f_oct_age+$age;
                $f_oct_av=$f_oct_age/$female_count_oct;
              }
          }
          elseif(date('M',strtotime($value['User']['register_date']))=='Nov')
          {
              if($value['User']['gender']=='Male')
              {
                $male_count_nov++;
                $m_nov_age=$m_nov_age+$age;
                $m_nov_av=$m_nov_age/$male_count_nov;
              }
              elseif ($value['User']['gender']=='Female') {
                $female_count_nov++;
                $f_nov_age=$f_nov_age+$age;
                $f_nov_av=$f_nov_age/$female_count_nov;
              }
          }
          elseif(date('M',strtotime($value['User']['register_date']))=='Dec')
          {
              if($value['User']['gender']=='Male')
              {
                $male_count_dec++;
                $m_dec_age=$m_dec_age+$age;
                $m_dec_av=$m_dec_age/$male_count_dec;
              }
              elseif ($value['User']['gender']=='Female') {
                $female_count_dec++;
                $f_dec_age=$f_dec_age+$age;
                $f_dec_av=$f_dec_age/$female_count_dec;
              }
          }
}

   
    ?>
    <script>
        $( document ).ready(function() {
// Handler for .ready() called.

    $(function () {
    $('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 1,//null,
            plotShadow: false
        },
        title: {
            text: 'Male/Female ratio'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: [
                ['Male',   <?php echo $male_count;?>],
                ['Female',       <?php echo $female_count;?>]
               
            ]
        }]
    });
});
});

    </script>
    <div id="container" style="min-width:1010px; height: 400px; max-width: 600px; margin: 0 auto"></div>
    <script>
    $( document ).ready(function() {
        $(function () {
    $('#container1').highcharts({
        
        chart: {
            type: 'line'
        },
        title: {
            text: 'Age Group'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Age Group'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [{
            name: 'Male',
            data: [<?php echo $male_count_jan; ?>, <?php echo $male_count_feb; ?>, <?php echo $male_count_mar; ?>, <?php echo $male_count_apr; ?>, <?php echo $male_count_may; ?>, <?php echo $male_count_june; ?>, <?php echo $male_count_july; ?>, <?php echo $male_count_aug; ?>, <?php echo $male_count_sep; ?>, <?php echo $male_count_oct; ?>, <?php echo $male_count_nov; ?>, <?php echo $male_count_dec; ?>]
        }, {
            name: 'Female',
            data: [<?php echo $female_count_jan; ?>, <?php echo $female_count_feb; ?>, <?php echo $female_count_mar; ?>, <?php echo $female_count_apr; ?>, <?php echo $female_count_may; ?>, <?php echo $female_count_june; ?>, <?php echo $female_count_july; ?>, <?php echo $female_count_aug; ?>, <?php echo $female_count_sep; ?>, <?php echo $female_count_oct; ?>, <?php echo $female_count_nov; ?>, <?php echo $female_count_dec; ?>]
        }]
    });
});
    });</script>
     <div id="container1" style="min-width: 1010px; height: 400px; max-width: 600px; margin: 0 auto"><?php echo $female_count_may; ?></div>
      </div>

   </div>
  </div> 
<?php echo $this->Html->script(array("jquery.form")); ?>
