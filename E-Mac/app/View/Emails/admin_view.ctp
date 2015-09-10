<div class='contentTop' style='padding: 0%;'>
    <?php
    echo $this->element('admin_header');
    echo $this->element('admin_sidebar');
    ?>
</div>
<div class="content" style="margin-left: 100px;">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-screen"></span><?php echo __('View Email');?></span>
        <div class="clear"></div>
    </div>
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li style='background:url("<?php echo $this->webroot; ?>img/icons/breadsHome.png") no-repeat scroll 12px 10px transparent'><a style="background:url('<?php echo $this->webroot; ?>img/icons/breadsArrow.png') no-repeat scroll 100% 10px transparent;" href="<?php echo $this->Html->url(array('controller'=>'Emails','action'=>'index'));?>"><?php echo __('Email Management');?></a></li>
                <li><a href="#"><?php echo __('View Email');?></a></li>
            </ul>
        </div>
    </div>
    <div class="wrapper">
        <div class="users form">
            <?php echo $this->Form->create('Email'); ?>
            <fieldset>
                <div class="widget fluid">
                    <div class="formRow">
                        <div class="grid3"><label>Title:</label></div>
                        <div class="grid9"><input type="text" name="title" class='disabled' value="<?php echo h($email['Email']['title']);?>"/></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <div class="grid3"><label>Content:</label></div>
                        <div class="grid9"><input type="text" name="content" class='disabled' value="<?php echo h($email['Email']['content']);?>"/></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <div class="grid3"><label>Custom Field:</label></div>
                        <div class="grid9"><input type="text" name="custom_field" class='disabled' value="<?php echo h($email['Email']['custom_field']);?>"/></div>
                        <div class="clear"></div>
                    </div>
                    <a style='margin-left: 1.5%;'href="<?php echo $this->Html->url(array('controller'=>'emails','action'=>'index'));?>" class="buttonL bSea">List Users</a>
                </div>
            </fieldset>
        </div>

    </div>
</div>