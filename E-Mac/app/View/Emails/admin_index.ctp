<div class='contentTop' style='padding: 0%;'>
    <?php
    echo $this->element('admin_header');
    echo $this->element('admin_sidebar');
    ?>
</div>
<div class="content" style="margin-left: 100px;">
    <?php echo $this->Session->flash(); ?>
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-screen"></span><?php echo __('Email Management');?></span>
        <div class="clear"></div>
    </div>

    <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li style='background:url("<?php echo $this->webroot; ?>img/icons/breadsHome.png") no-repeat scroll 12px 10px transparent'><a href="#"><?php echo __('Email Management');?></a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
    <div class='wrapper'>
        <ul class="middleNavR">
            <li><a href="<?php echo $this->Html->url(array('controller'=>'emails','action'=>'add'));?>" title="Add Email" class="tipN"><?php echo $this->Html->image('icons/middlenav/add.png');?></a></li>
        </ul>
        <div class="widget">
            <div class="whead">
                <form class="form-search" style='float: right;'>
                    <div class="input-append">
                        <input type="text" class="span2 search-query" placeholder='Search Here' style='height: 100%;margin: 0;'>
                        <button type="submit" class='tablectrl_small bBlue tipS'><?php echo $this->Html->image('icons/color/search.png',array('height'=>'10','width'=>'10'));?>&nbsp;Search</button>
                    </div>
                </form>
                <div class="clear"></div>
            </div>
            <table cellpadding="0" cellspacing="0" width="100%" class="tDark">
                <thead>
                    <tr style='background:url("<?php echo $this->webroot; ?>img/backgrounds/sidebar.jpg") repeat scroll 0 0 transparent; text-align: left;'>
                        <td style='text-align: left;'><input type="checkbox" style="opacity: 1;" class='chk_boxes'></td>
                        <td style='text-align: left;'><?php echo $this->Paginator->sort('Title'); ?></td>
                        <td style='text-align: left;'><?php echo $this->Paginator->sort('Content'); ?></td>
                        <td style='text-align: left;'><?php echo $this->Paginator->sort('Custom Field');?></td>
                        <td class="actions" style='text-align: left;'><?php echo __('Actions'); ?></td>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td colspan="6">
                            <div class="tPages" style='width: 20%; float: left;'>
                                <div style='width: 45%; height: 90%; border: 1px #AAAAAA solid; border-radius: 4px;float: left;text-align: center;'> 
                                    <?php echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));?>
                                </div>
                                <?php echo $this->Paginator->numbers(array('separator' => ''));?>
                                <div style='width: 40%; height: 90%; border: 1px #AAAAAA solid; border-radius: 4px;float: left;margin-left: 1%;text-align: center;'>
                                    <?php echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));?>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tfoot>
                <?php foreach ($emails as $email): ?>
                <tbody>
                    <tr>
                        <td><input type='checkbox' class='chk_boxes1'></td>
                        <td><?php echo h($email['Email']['title']); ?>&nbsp;</td>
                        <td><?php echo h($email['Email']['content']); ?>&nbsp;</td>
                        <td><?php echo h($email['Email']['custom_field']); ?>&nbsp;</td>
                        <td class="actions">
                            <a href="<?php echo $this->Html->url(array('controller'=>'emails','action'=>'view',$email['Email']['id']));?>" class="tablectrl_small bSea tipS" title="View"><span class="iconb" data-icon="&#xe1f7;"></span></a>
                            <a href="<?php echo $this->Html->url(array('controller'=>'emails','action'=>'edit',$email['Email']['id']));?>" class="tablectrl_small bBlue tipS" title="Edit"><span class="iconb" data-icon="&#xe1db;"></span></a>
                            <?php echo $this->Form->postLink($this->Html->image('/img/icons/delete.png',array('height'=>13,'width'=>13)),array('controller'=>'Emails','action'=>'delete',$email['Email']['id']),array('escape'=>false,'class'=>'tablectrl_small bRed tipS','title'=>'Delete','style'=>'height: '));?>
                            <?php 
                            $status = h($email['Email']['status']);
                            if($status==0){
                            echo $this->Form->postLink($this->Html->image('/img/test-pass-icon.png',array('height'=>13,'width'=>13)),array('controller'=>'Emails','action'=>'activate',$email['Email']['id']),array('escape'=>false,'class'=>'tablectrl_small bDefault tipS','title'=>'Activate','style'=>'height: '));
                            } else if($status==1){
                            echo $this->Form->postLink($this->Html->image('/img/test-fail-icon.png',array('height'=>13,'width'=>13)),array('controller'=>'Emails','action'=>'deactivate',$email['Email']['id']),array('escape'=>false,'class'=>'tablectrl_small bDefault tipS','title'=>'Deactivate','style'=>'height: '));
                            }?> 
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>