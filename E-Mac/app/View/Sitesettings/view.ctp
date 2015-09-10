<div class="sitesettings view">
<h2><?php  echo __('Sitesetting'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($sitesetting['Sitesetting']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($sitesetting['Sitesetting']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Web Url'); ?></dt>
		<dd>
			<?php echo h($sitesetting['Sitesetting']['web_url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Keywords'); ?></dt>
		<dd>
			<?php echo h($sitesetting['Sitesetting']['keywords']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Site Desc'); ?></dt>
		<dd>
			<?php echo h($sitesetting['Sitesetting']['site_desc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Facebook Url'); ?></dt>
		<dd>
			<?php echo h($sitesetting['Sitesetting']['facebook_url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Twitter Url'); ?></dt>
		<dd>
			<?php echo h($sitesetting['Sitesetting']['twitter_url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Googleplus'); ?></dt>
		<dd>
			<?php echo h($sitesetting['Sitesetting']['googleplus']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Sitesetting'), array('action' => 'edit', $sitesetting['Sitesetting']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Sitesetting'), array('action' => 'delete', $sitesetting['Sitesetting']['id']), null, __('Are you sure you want to delete # %s?', $sitesetting['Sitesetting']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Sitesettings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sitesetting'), array('action' => 'add')); ?> </li>
	</ul>
</div>
