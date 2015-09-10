<div class='contentTop' style='padding: 0%;'>
    <?php
    echo $this->element('admin_header');
    echo $this->element('admin_sidebar');
    ?>
</div>
<div class="content" style="margin-left: 100px;">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-screen"></span><?php echo __('Edit Email');?></span>
        <div class="clear"></div>
    </div>
    <div class="breadLine">
        <div class="bc">
            <div class="bc">
                <ul id="breadcrumbs" class="breadcrumbs">
                    <li style='background:url("<?php echo $this->webroot; ?>img/icons/breadsHome.png") no-repeat scroll 12px 10px transparent'><a style="background:url('<?php echo $this->webroot; ?>img/icons/breadsArrow.png') no-repeat scroll 100% 10px transparent;" href="<?php echo $this->Html->url(array('controller'=>'Emails','action'=>'index'));?>"><?php echo __('Email Management');?></a></li>
                    <li><a href="#"><?php echo __('Edit Email');?></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="wrapper">
        <div class="users form">
            <?php echo $this->Form->create('Email'); ?>
            <fieldset>
                <div class="widget fluid">
                    <div class="whead"><h6><?php echo __('Edit Email Form');?></h6><div class="clear"></div></div>
                    <?php echo $this->Form->input('id');?>
                    <div class='formRow'>
                        <div class="grid2"><label><?php echo __('Title:');?></label></div>
                        <div class='grid9'>
                            <?php echo $this->Form->input('title',array('label'=>false,'div'=>false));?>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class='formRow'>
                        <div class="grid2"><label><?php echo __('Content:');?></label></div>
                        <div class='grid9'>
                            <?php echo $this->Form->input('content',array('label'=>false,'div'=>false,'type'=>'text'));?>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class='formRow'>
                        <div class="grid2"><label><?php echo __('Custom Field:');?></label></div>
                        <div class='grid9'>
                            <?php echo $this->Form->input('custom_field',array('label'=>false,'div'=>false,'type'=>'text'));?>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div style='margin-top: 2%;margin-left: 40%;'>
                        <a href="<?php echo $this->Html->url(array('controller'=>'emails','action'=>'index'));?>">
                            <button type='submit' class='buttonL bGreen'><?php echo __('Submit');?></button>
                        </a>
                        <a href="<?php echo $this->Html->url(array('controller'=>'emails','action'=>'index'));?>" class="buttonL bSea">
                            <?php echo __('Back');?>
                        </a>
                    </div>
                </div>
            </fieldset>

            </form>
        </div>
    </div>