<div class='contentTop' style='padding: 0%;'>
    <?php
    echo $this->element('admin_header');
    echo $this->element('admin_sidebar');
    ?>
</div>
<div class="content" style="margin-left: 100px;">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-screen"></span><?php echo __('Edit Profile');?></span>
        <div class="clear"></div>
    </div>
    <?php $x=$this->Session->flash(); ?>
    <?php if($x){ ?>
    <div class="nNote nSuccess" id="flash">
        <div class="" style="text-align:center" > <?php echo $x; ?></div>
    </div>
    <?php } ?>
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li style='background:url("<?php echo $this->webroot; ?>img/icons/breadsHome.png") no-repeat scroll 12px 10px transparent'><a style="background:url('<?php echo $this->webroot; ?>img/icons/breadsArrow.png') no-repeat scroll 100% 10px transparent;" href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'dashboard'));?>"><?php echo __('Dashboard');?></a></li>
                <li><a style="background:url('<?php echo $this->webroot; ?>img/icons/breadsArrow.png') no-repeat scroll 100% 10px transparent;" href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'profile'));?>"><?php echo __('Admin Profile');?></a></li>
                <li><a href="#"><?php echo __('Edit Profile');?></a></li>
            </ul>
        </div>
    </div>
    <div class="wrapper">
        <div class="users form">
            <?php echo $this->Form->create('User',array('type'=>'file')); ?>
            <fieldset>
                <div class="widget fluid">
                    <div class="whead"><h6><?php echo __('Edit Profile Form');?></h6><div class="clear"></div></div>
                    <?php echo $this->Form->input('id');?>
                    <div class="formRow">
                        <div class="grid3"><label>Profile Image:</label></div>
                        <div class="grid9"><input type="file" name="data[User][image]"/></div>
                        <div class="clear"></div>
                    </div>
                    <div class='formRow'>
                        <div class="grid2"><label><?php echo __('Name:');?></label></div>
                        <div class='grid9'>
                            <?php echo $this->Form->input('name',array('label'=>false,'div'=>false));?>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class='formRow'>
                        <div class="grid2"><label><?php echo __('Email:');?></label></div>
                        <div class='grid9'>
                            <?php echo $this->Form->input('email',array('label'=>false,'div'=>false,'type'=>'text'));?>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class='formRow'>
                        <div class="grid2"><label><?php echo __('Gender:');?></label></div>
                        <div class='grid9'>
                            <?php echo $this->Form->input('gender',array('label'=>false,'div'=>false));?>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class='formRow'>
                        <div class="grid2"><label><?php echo __('Address:');?></label></div>
                        <div class='grid9'>
                            <?php echo $this->Form->input('address',array('label'=>false,'div'=>false));?>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class='formRow'>
                        <div class="grid2"><label><?php echo __('Phone Number:');?></label></div>
                        <div class='grid9'>
                            <?php echo $this->Form->input('phone',array('label'=>false,'div'=>false,'type'=>'text'));?>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class='formRow'>
                        <div class="grid2"><label>Company Name:</label></div>
                        <div class='grid9'>
                            <?php echo $this->Form->input('company_name',array('label'=>false,'div'=>false,'type'=>'text'));?>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class='formRow'>
                        <div class="grid2"><label>Company Email:</label></div>
                        <div class='grid9'>
                            <?php echo $this->Form->input('company_email',array('label'=>false,'div'=>false,'type'=>'text'));?>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class='formRow'>
                        <div class="grid2"><label>Company Address:</label></div>
                        <div class='grid9'>
                            <?php echo $this->Form->input('company_address',array('label'=>false,'div'=>false,'type'=>'text'));?>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <div class="grid3"><label>Upload CSV File:</label></div>
                        <div class="grid9"><input type="file" name="data[User][csv_file]"/></div>
                        <div class="clear"></div>
                    </div>
                    <div class='formRow'>
                        <div class="grid2"><label>Gender:</label></div>
                        <div class='grid9'>
                            <?php 
                            $gender = h($user_data['User']['gender']);
                            if($gender == 'male'){
                            ?>
                            <input type='radio' name='data[User][gender]' value="male" checked/>&nbsp;Male
                            <input type='radio' name="data[User][gender]" value="female"/>&nbsp;Female
                            <?php } else if($gender == 'female'){?>
                            <input type='radio' name='data[User][gender]' value="male"/>&nbsp;Male
                            <input type='radio' name="data[User][gender]" value="female" checked/>&nbsp;Female
                            <?php }?>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div style='margin-top: 2%;margin-left: 40%;'>
                        <button type='submit' class='buttonL bGreen'>Submit</button>
                        <a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'admin_profile'));?>" class="buttonL bSea">
                            Back
                        </a>
                    </div>
                </div>
            </fieldset>
            </form>
        </div>
    </div>