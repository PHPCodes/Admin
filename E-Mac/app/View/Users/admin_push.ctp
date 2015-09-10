<?php echo $this->Html->script('jquery.validate');?>
<style>
    .error{
        color: red;
    }
</style>
<script type="text/javascript">
    $("#user").validate();
</script>
<div class='contentTop' style='padding: 0%;'>
    <?php
    echo $this->element('admin_header');
    echo $this->element('admin_sidebar');
    ?>
</div>
<div class="content" style="margin-left: 100px;">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-screen"></span>Send Push Message</span>
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
                <li style='background:url("<?php echo $this->webroot; ?>img/icons/breadsHome.png") no-repeat scroll 12px 10px transparent'><a style="background:url('<?php echo $this->webroot; ?>img/icons/breadsArrow.png') no-repeat scroll 100% 10px transparent;" href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'push'));?>"><?php echo __('Push Message');?></a></li>
            </ul>
        </div>
    </div>
    <div class="wrapper">
        <div class="users form">
            <?php echo $this->Form->create('User'); ?>
            <fieldset>
                <div class="widget fluid">
                    <div class="whead"><h6><?php echo __('Push Message');?></h6><div class="clear"></div></div>
                    <div class="formRow">
                        <div class="grid3"><label>Send to all:</label></div>
                        <div class="grid9"><?php echo $this->Form->input('checkall',array('label'=>false,'type'=>'checkbox'))?></div>
                        
                        <div class="clear"></div>
                    </div>
                    <script type="text/javascript">
                        CharacterCount = function(TextArea, FieldToCount) {
                            var myField = document.getElementById(TextArea);
                            var myLabel = document.getElementById(FieldToCount);
                            if (!myField || !myLabel) {
                                return false
                            }
                            ; // catches errors
                            var MaxChars = myField.maxLengh;
                            if (!MaxChars) {
                                MaxChars = myField.getAttribute('maxlength');
                            }
                            ;
                            if (!MaxChars) {
                                return false
                            }
                            ;
                            var remainingChars = MaxChars - myField.value.length;
                            myLabel.innerHTML = remainingChars + " Characters Remaining of Maximum " + MaxChars+ " Characters";
                        }
                        setInterval(function() {
                            CharacterCount('message', 'CharCountLabel1')},55
                        );
                    </script>
                    <div class="formRow">
                        <div class="grid3"><label>Write Push Message:</label></div>
                        <div class="grid9"><?php echo $this->Form->input('push',array('label'=>false,'type'=>'textarea','id'=>'message','maxlength'=>'100'))?><div id='CharCountLabel1'></div></div>
                        
                        <div class="clear"></div>
                        
                    </div>
                    <!--                    <input type="hidden" name="data[User][ip_address]" value="<?php echo $_SERVER['REMOTE_ADDR'];?>"/>
                                        <input type="hidden" name="data[User][register_date]" value="<?php echo date('d/m/Y');?>"/>
                                        <input type="hidden" name="data[User][status]" value="1"/>-->
                    <div style='margin-top: 3%;margin-left: 40%;'>
                        <a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'index'));?>">
                            <button class="buttonL bGreen" type="submit">Send</button>
                        </a>
                        <!--                        <a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'index'));?>" class="buttonL bSea">
                                                    Back
                                                </a>-->
                    </div>
                </div>
            </fieldset>
            </form>
        </div>
    </div>
</div>