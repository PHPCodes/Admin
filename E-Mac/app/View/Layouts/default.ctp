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
$cakeAdmin= __d('linkedap', 'linkedap');
?>  
<!DOCTYPE html>
<html lang="en">
<head>
	<?php echo $this->Html->charset(); ?>
	
	<title><?php echo $site['Sitesetting']['title']; ?></title>
	<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>-->
	<?php
		echo $this->Html->meta('icon');
        echo $this->Html->css(array('bootstrap','bootstrap.min','mystyle','bootstrap-editable','mysheet'));
		echo $this->Html->script('jquery-1.7.1.min');
		echo $this->Html->script(array('jquery.validate','jquery.ui.datepicker','bootstrap.min','jquery.equalheights','jquery.cycle.all','jquery.jqChart.min','customcheckall'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>

</head>
<body>
<!----Session Flash Pop Up---------->
<?php //echo $this->Session->flash(); ?>

<!----Session Flash Pop Up Over---->
<?php //if(($authority ==NULL)||($authority == "3")){ ?>
<?php echo $this->fetch('content');  ?>
</body>
<!--<script type="text/javascript">
$(document).ready(function(){ 
$('#pgLoader').hide(1000,function(){$('body').fadeIn(1000);});
});
</script>-->
</html>
