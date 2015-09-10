<?php echo $this->element('top-header'); ?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span9" style="background-color:white;margin-left:18%;"> 
            <p align="center"><h1  style="color:#B5B9BC;margin-left:20px;">Get the most from your professional network</h1></p>
            <div class="span3 well" style="margin:15px;">
                <h4>Re-Connect</h4>
                <?php echo $this->Html->image('reconnect.png',array('style'=>'padding:5px;')); ?>
                <p>Find past and present colleagues and classmates quickly. Academatch makes <a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'loggedin')) ?>">staying in touch </a>simple.</p>
            </div>
            <div class="span3 well"  style="margin:15px;">
                <h4>Power your career</h4>
                 <?php echo $this->Html->image('arrow.png',array('style'=>'padding:5px;')); ?>
                <p>Discover inside connections when you're looking for a job or new business opportunity.</p>
              </div>
            <div class="span3 well"  style="margin:15px;">
                <h4>Get answers</h4>
                 <?php echo $this->Html->image('answer.png',array('style'=>'padding:5px;')); ?>
                <p>Your network is full of industry experts willing to share advice. Have a question? Just ask.</p>
            </div>    
        </div>  
    </div>
    <div class="row-fluid">
        <div class="span5" style="background-color:white;margin-left:30%;margin-bottom:150px;"> 
            <div style="background-color:white;"><h2>Ready to get started?&nbsp;&nbsp;&nbsp;<a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'loggedin')) ?>" class="btn btn-warning">Join Now</a> </h2></div>
        </div>
    </div>    
</div>
<?php echo $this->element('footer'); ?>
 
          