<div id="top" style='background:#000 url("<?php echo $this->webroot; ?>img/backgrounds/top.jpg") repeat fixed !important;'>

</div>

<div class="loginWrapper">

    <!-- Current user form -->
    <?php echo $this->Session->flash('auth'); ?>
    <?php echo $this->Form->create('User'); ?>
    <div class="loginPic">
        <a href="#" title=""><img src="/img/logo.png" alt="" /></a> 
    </div>
    <?php $x=$this->Session->flash(); ?>
    <?php if($x){ ?>
    <div class="nNote nSuccess" id="flash">
        <div class="" style="text-align:center" > <?php echo $x; ?></div>
    </div>
    <?php } ?>
    <div class='loginUsername'> 
        Email&nbsp;<?php echo $this->Form->input('Email',array('label'=>false,'div'=>false,'placeholder'=>'Email'));?>

    </div>
    <div class="logControl">
        <a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'index'));?>" style='margin-left: 48%;margin-right: 1%;'>
            <button type="submit" class="buttonM bBlue" style="padding: 2% 0%;width: 100px; height: 30px;font-size: 12px;">Get Password</button>
        </a>
        <div class="clear"></div>
    </div>
</form>
</div>