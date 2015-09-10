<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('Academatch', 'Academatch');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo $site['Sitesetting']['title']; ?> Admin</title>
	<?php
		// echo $this->Html->meta('icon');

		echo $this->Html->css(array('bootstrap','elfinder','fancybox','font','fullcalendar','ie','plugins','reset','styles','ui_custom','jquery.jqChart','toltip','jquery.ui.timepicker','jquery-ui-1.10.0.custom.min','fancybox/jquery.fancybox-1.3.4'));
		echo $this->Html->script(array('jquery-1.7.1.min','jquery.form.wizard','jquery.validate','jquery.form','jquery.jqChart.min','jquery.ui.core','jquery.ui.widget','jquery.ui.datepicker','jquery.ui.tooltip','jquery.tipTip','customcheckall','jquery.cycle.all','jcarousellite_1.0.1c4','jquery.ui.timepicker','fancybox/jquery.easing-1.3.pack','fancybox/jquery.fancybox-1.3.4','fancybox/jquery.fancybox-1.3.4.pack','fancybox/jquery.mousewheel-3.0.4.pack'));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
<!--<script type="text/javascript" src="http://rickharrison.github.io/validate.js/validate.min.js"></script>-->
<?php echo $this->Session->flash(); ?>
<?php if((@$authority ==NULL)||(@$authority == 5)){  
 echo $this->fetch('content');
}else{
  //  header("Location:http://academatch.net");
   
 //    echo $this->Html->css(array('bootstrap.min','mystyle','mysheet'));
//    echo $this->element('header');  ?>
<div align="center" style="margin:100px;">
<img src="/img/permission.jpeg"/>
<h2>Sorry !!!! Permissions denied because you are not using the authority that is assigned to you.</h2>
</div>
  <?php //echo $this->element('foot'); 
 } ?> 
 <?php //echo $this->element('sql_dump'); ?>
</body>
</html> 
