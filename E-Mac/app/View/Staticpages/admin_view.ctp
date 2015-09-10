<div class="staticpages view">
<h2><?php  echo __('Staticpage'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($staticpage['Staticpage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($staticpage['Staticpage']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($staticpage['Staticpage']['content']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($staticpage['Staticpage']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Staticpage'), array('action' => 'edit', $staticpage['Staticpage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Staticpage'), array('action' => 'delete', $staticpage['Staticpage']['id']), null, __('Are you sure you want to delete # %s?', $staticpage['Staticpage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Staticpages'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Staticpage'), array('action' => 'add')); ?> </li>
	</ul>
</div>
