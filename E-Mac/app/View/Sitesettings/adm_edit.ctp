<div class="sitesettings form">
<?php echo $this->Form->create('Sitesetting'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Sitesetting'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('web_url');
		echo $this->Form->input('keywords');
		echo $this->Form->input('site_desc');
		echo $this->Form->input('facebook_url');
		echo $this->Form->input('twitter_url');
		echo $this->Form->input('googleplus');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Sitesetting.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Sitesetting.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Sitesettings'), array('action' => 'index')); ?></li>
	</ul>
</div>
