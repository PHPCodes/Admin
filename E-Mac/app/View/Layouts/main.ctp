<?php
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php //echo $cakeDescription ?>
		<?php //echo $title_for_layout; ?>
		Pocket Duniya
	</title>
	<?php
		echo $this->Html->meta('icon');
                echo $this->Html->css('custom');                
                echo $this->Html->css('jquery.bxslider');
                echo $this->Html->css('flexnav');
                

		//echo $this->Html->css('');
                echo $this->Html->script('jquery-1.11.0.min');
                echo $this->Html->script('jquery.bxslider');
                echo $this->Html->script('custom');
                echo $this->Html->script('script');
                echo $this->Html->script('jquery.flexnav');
                
                
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">		
		<div id="content">
                         <?php include "header.ctp"?>
			<?php echo $this->fetch('content'); ?>
                        <?php include "footer.ctp"?>
		</div>
	</div>
</body>
</html>
