<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo __('Katann');?>
	</title>
    <script src="http://code.jquery.com/jquery-1.10.1.js"></script>
	<?php
		echo $this->Html->meta('icon');
                echo $this->Html->script(array('autogrowtextarea','bar','bar_side','bootstrap','chart','chart_side','excanvas.min','functions','hBar','hBar_side','jquery.autotab','jquery.breadcrumbs','jquery.chosen.min','jquery.cleditor','jquery.collapsible.min','jquery.colorpicker','jquery.dataTables','jquery.dualListBox','jquery.easytabs.min','jquery.elfinder','jquery.fancybox','jquery.fileTree','jquery.flot','jquery.flot.orderBars','jquery.flot.pie','jquery.flot.resize','jquery.form','jquery.form.wizard','jquery.fullcalendar','jquery.ibutton','jquery.inputlimiter.min','jquery.jgrowl','jquery.maskedinput.min','jquery.mousewheel','jquery.plupload.queue','jquery.progress','jquery.resizable','jquery.rounded.progress','jquery.sortable','jquery.sourcerer','jquery.sparkline.min','jquery.tagsinput.min','jquery.timeentry.min','jquery.tipsy','jquery.uniform','jquery.validate','jquery.validationEngine','jquery.validationEngine-en','login','pie','plupload','plupload.html4','plupload.html5','roundLoader','ui.spinner','updating','bootstrap.min'));
                echo $this->Html->css(array('bootstrap-responsive','elfinder','bootstrap','fancybox','font','fullcalendar','ie','plugins','reset','styles','ui_custom'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
    
		<div id="container">
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
		</div>
</body>
</html>
