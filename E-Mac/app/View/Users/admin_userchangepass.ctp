<?php echo $this->Html->script('jquery.validate');?>
<style>
    .error{
        color: red;
    }
</style>
<script type="text/javascript">
    $("#changepas").validate();
</script>
<div class='contentTop' style='padding: 0%;'>
    <?php
    echo $this->element('admin_header');
    echo $this->element('admin_sidebar');
    ?>
</div>
<div class="content" style="margin-left: 100px;">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-screen"></span>Admin Change Password</span>
        <?php echo $this->element('admin_user'); ?>
    </div>
    <?php $x=$this->Session->flash(); ?>
    <?php if($x){ ?>
    <div class="nNote nSuccess" id="flash">
        <div class="" style="text-align:center" > <?php echo $x; ?></div>
    </div>
    <?php } ?>
    <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li style='background:url("<?php echo $this->webroot; ?>img/icons/breadsHome.png") no-repeat scroll 12px 10px transparent'><a style="background:url('<?php echo $this->webroot; ?>img/icons/breadsArrow.png') no-repeat scroll 100% 10px transparent;" href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'dashboard'));?>"><?php echo __('Dashboard');?></a></li>
                <li><a style="background:url('<?php echo $this->webroot; ?>img/icons/breadsArrow.png') no-repeat scroll 100% 10px transparent;" href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'index'));?>"><?php echo __('User Management');?></a></li>
                <li><a style="background:url('<?php echo $this->webroot; ?>img/icons/breadsArrow.png') no-repeat scroll 100% 10px transparent;" href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'edit',$user['User']['id']));?>"><?php echo __('Edit User');?></a></li>
                <li class='current'><a><?php echo __('Change Password');?></a></li>
            </ul>
        </div>
        <div class="breadLinks"></div>
    </div>
    <!-- Main content -->
    <div class='wrapper'>
        <fieldset>
            <div class="widget fluid">
                <div class="whead"><h6>Change Password</h6>
                    <span style="float:right;"><a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'admin_profile'));?>" class="tOptions" title="Back"><?php echo $this->Html->Image('../img/icons/options'); ?></a></span>
                </div>
                <div class="clear"></div>
            </div>
            <?php echo $this->Form->create('User',array('url'=>array('controller'=>'Users','action'=>'userchangepass',$user['User']['id']))); ?>
            <div class="widget fluid">
                <input type='hidden' value="<?php echo $user['User']['id'];?>" name="id">
                <div class="formRow">
                    <div class="grid3"><label>Old Password:</label></div>
                    <div class="grid9">
                        <?php echo $this->Form->input('old_password', array('label'=>"",'id'=>'required','class'=>'error','type'=>'password','required'));?>
                    </div>
                </div>
                <div class="formRow">
                    <div class="grid3"><label>New Password:</label></div>
                    <div class="grid9">
                        <?php echo $this->Form->input('new_password', array('label'=>"",'type'=>'password','required'));?>
                    </div>
                </div>
                <div class="formRow">
                    <div class="grid3"><label>Confirm Password:</label></div>
                    <div class="grid9">
                        <?php echo $this->Form->input('cpassword', array('label'=>"",'type'=>'password','required'));?>
                    </div>
                </div>
                <div class="formRow">
                    <div class="grid3"><label></label></div>
                    <div class="grid9">
                        <button type="submit" name="Save" id="update" class="buttonS bLightBlue" >Save</button>
                    </div>
                </div>
            </div>
            </form>
        </fieldset>
    </div>
</div>