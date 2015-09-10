<?php ?>
<script>
    $(function() {
        $('#titleCheck').click(function() {
            var checked = $(this).attr('checked') ? true : false;
            $('.checkAll').attr('checked', checked);
        });
    });
</script>
<div class='contentTop' style='padding: 0%;'>
    <?php
    echo $this->element('admin_header');
    echo $this->element('admin_sidebar');
    ?>
</div>
<div class="content" style="margin-left: 100px;">
    <?php $x=$this->Session->flash(); ?>
    <?php if($x){ ?>
    <div class="nNote nSuccess" id="flash">
        <div class="" style="text-align:center" > <?php echo $x; ?></div>
    </div>
    <?php } ?>
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-screen"></span>User Management</span>
        <div class="clear"></div>
    </div>

    <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li style='background:url("<?php echo $this->webroot; ?>img/icons/breadsHome.png") no-repeat scroll 12px 10px transparent'><a href="#"><?php echo __('User Management');?></a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
    <div class='wrapper'>
<!--        <ul class="middleNavR">
            <?php if($userscount<11){?>
            <li><a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'add'));?>" title="Add User" class="tipN"><?php echo $this->Html->image('icons/middlenav/add.png');?></a></li>
            <?php }?>
        </ul>-->
        <div class="widget">
<!--            <div class="whead">
                <?php echo $this->Form->create('User',array('style'=>'width: 100%;'))?>
                <div class="input-append" style='float: right;'>
                     <select name='data[select]' style='width: 150px;'>
                         <option>--Select--</option>
                        <option value="Active">Active</option>
                        <option value="Deactive">Deactive</option>
                        <option value="Admin">Admin</option>
                        <option value="Subadmin">Subadmin</option>
                        <option value="User">User</option>
                    </select>
                   &nbsp; <span><b>OR</b></span>&nbsp;
                    <input type="text" name='keyword' class="span2 search-query" placeholder='Search Here' style='height: 100%;margin: 0;'>
                    <button type="submit" class='tablectrl_small bBlue tipS'><?php echo $this->Html->image('icons/color/search.png',array('height'=>'10','width'=>'10'));?>&nbsp;Search</button>
                </div>
                </form>
                <div class="clear"></div>
            </div>-->
            <table cellpadding="0" cellspacing="0" class="tDark" width="100%">
                <thead>
                    <tr style='background:url("<?php echo $this->webroot; ?>img/backgrounds/sidebar.jpg") repeat scroll 0 0 transparent; text-align: left;'>
                        <!--<td style='text-align: left;'></td>-->
                        <td style='text-align: left;'><?php echo 'Name';?></td>
                        <td style='text-align: left;'><?php echo 'User Group';?></td>
                        <td style='text-align: left;'><?php echo 'Email';?></td>
                        <td style='text-align: left;'><?php echo 'Logo';?></td>
                        <td style='text-align: left;'><?php echo 'Comapny';?></td>
                        <td class="actions" style='text-align: left;'><?php echo __('Actions'); ?></td>
                    </tr>
                </thead>
                <tfoot>
<!--                    <tr>
                        <td colspan="6">
                            <div class="tPages" style='width: 20%; float: left;'>
                                <div style='width: 45%; height: 90%; border: 1px #AAAAAA solid; border-radius: 4px;float: left;text-align: center;'> 
                                    <?php echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));?>
                                </div>
                                <?php echo $this->Paginator->numbers(array('separator' => '&nbsp;&nbsp;&nbsp;'));?>
                                <div style='width: 40%; height: 90%; border: 1px #AAAAAA solid; border-radius: 4px;float: left;margin-left: 1%;text-align: center;'>
                                    <?php echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));?>
                                </div>
                            </div>
                        </td>
                    </tr>-->
                </tfoot>
                <?php 
                if($users != Null){
                foreach ($users as $user): 
                $group_id = $user['User']['user_group'];
                if(!($group_id == 1)){?>
                <tbody>
                    <tr>
                        <!--<td><?php echo $this->Form->checkbox("use"+$user['User']['id'],array('value' => $user['User']['id'],'class'=>'checkAll')); ?></td>-->
                        <td style="padding: 5px;"><?php echo h($user['User']['name']); ?>&nbsp;</td>
                        <td>
                            <?php
                            if($group_id == 1){?>
                            <?php echo __('Admin');
                            }else if($group_id == 2){
                            echo __('SubAdmin');?>
                            <?php }else if($group_id == 3){                        
                            echo __('User');}?>
                        </td>
                        <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
                        
                        <td><?php if($user['User']['image']){?><img src="/files/profileimage/<?php echo h($user['User']['image']); ?>" height="50" width="50"/>&nbsp;<?php }?></td>
                        <td><?php echo h($user['User']['company_name']); ?>&nbsp;</td>
                        <td class="actions">
                            <a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'view',$user['User']['id']));?>" class="tablectrl_small bSea tipS" title="View"><span class="iconb" data-icon="&#xe1f7;"></span></a>
                            <a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'edit',$user['User']['id']));?>" class="tablectrl_small bBlue tipS" title="Edit"><span class="iconb" data-icon="&#xe1db;"></span></a>
                            <a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'graph',$user['User']['id']));?>" class="tablectrl_small bBrown tipS" title="Graph"><span class="iconb" data-icon="&#xe1fb;"></span></a>
                            
                            <?php 
                            $status = h($user['User']['status']);
                            if($status==1){
                            echo $this->Form->postLink($this->Html->image('/img/test-pass-icon.png',array('height'=>13,'width'=>13)),array('action' => 'block',$user['User']['id']),array('escape'=>false,'class'=>'tablectrl_small bDefault tipS','title'=>'Deactivate','style'=>'height: '));
                            } else if($status==0){
                            echo $this->Form->postLink($this->Html->image('/img/test-fail-icon.png',array('height'=>13,'width'=>13)),array('action' => 'unblock',$user['User']['id']),array('escape'=>false,'class'=>'tablectrl_small bDefault tipS','title'=>'Activate','style'=>'height: '));
                            }?> 
                            <?php
                            if($user_data == 1){
                            //echo $this->Form->postLink($this->Html->image('/img/icons/delete.png',array('height'=>13,'width'=>13)),array('controller'=>'Users','action'=>'delete',$user['User']['id']),array('escape'=>false,'class'=>'tablectrl_small bRed tipS','title'=>'Delete','style'=>'height: '));?>
<!--                            <a class="btn bSea">-->
                                <span  style="color:white;padding:5px;border: 1px solid red;background-color: #C77070;" title="Delete">
                                <?php  echo $this->Form->postLink('X', array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
                                </span>
<!--                            </a>-->
                               <?php  }?>
                        </td>
                    </tr>
                </tbody>
                <?php }endforeach; }else if($users== NULL){?>
                <tbody>
                    <tr>
                        <td colspan='5'>
                            NO RECORDS
                        </td>
                    </tr>
                </tbody>
                <?php }?>
            </table>
        </div>
    </div>
</div>