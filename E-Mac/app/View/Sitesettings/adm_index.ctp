<div class="sitesettings index">
	<h2><?php echo __('Sitesettings'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('web_url'); ?></th>
			<th><?php echo $this->Paginator->sort('keywords'); ?></th>
			<th><?php echo $this->Paginator->sort('site_desc'); ?></th>
			<th><?php echo $this->Paginator->sort('facebook_url'); ?></th>
			<th><?php echo $this->Paginator->sort('twitter_url'); ?></th>
			<th><?php echo $this->Paginator->sort('googleplus'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($sitesettings as $sitesetting): ?>
	<tr>
		<td><?php echo h($sitesetting['Sitesetting']['id']); ?>&nbsp;</td>
		<td><?php echo h($sitesetting['Sitesetting']['title']); ?>&nbsp;</td>
		<td><?php echo h($sitesetting['Sitesetting']['web_url']); ?>&nbsp;</td>
		<td><?php echo h($sitesetting['Sitesetting']['keywords']); ?>&nbsp;</td>
		<td><?php echo h($sitesetting['Sitesetting']['site_desc']); ?>&nbsp;</td>
		<td><?php echo h($sitesetting['Sitesetting']['facebook_url']); ?>&nbsp;</td>
		<td><?php echo h($sitesetting['Sitesetting']['twitter_url']); ?>&nbsp;</td>
		<td><?php echo h($sitesetting['Sitesetting']['googleplus']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $sitesetting['Sitesetting']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $sitesetting['Sitesetting']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $sitesetting['Sitesetting']['id']), null, __('Are you sure you want to delete # %s?', $sitesetting['Sitesetting']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Sitesetting'), array('action' => 'add')); ?></li>
	</ul>
</div>
