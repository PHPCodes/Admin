<?php echo $this->element('top-header'); ?>
<?php echo $this->Html->script(array('jquery.hovercard')); ?>
<!-- -------------------------- -->
<script type="text/javascript">
$(document).ready(function() {
	
<?php if(@$r = $this->Session->flash()){?>	
   alert(<?php echo $r; ?>);
<?php } ?>   
});
</script>
<!-- --------------------------------- -->
<style>
.img:hover {box-shadow:2px 2px 2px;}
</style>
<div class="row-fluid">  
   <div class="span8" style="background-color:white;">
        <div class="span12">
                    <?php $x=$this->Session->flash(); ?>
                    <?php if($x){ ?>
                     <div class="alert alert-block" style="margin-left:10px; margin-top:5px; width:88%;background-color:#5DA150;color:white;">
<button type="button" class="close" data-dismiss="alert">&times;</button>                
                    <strong><?php echo $x; ?></strong>
                   </div>
                   <?php }?> 
                    </div>
    <div class="top">
      <!-- ---------------- -->
            <ul class="nav nav-tabs" id="myTab">
    <li class="active"><a href="#home">Connections</a></li>
    <li><a href="#profile">Imported Contacts</a></li>
    <li><a href="#messages">Profile Organizer</a></li>
    </ul>
    <div class="tab-content">
    <div class="tab-pane active" id="home">
   Filter Connections
    </div>
    <div class="tab-pane" id="profile">
    These are your other contacts that are not yet connected to you on LinkedIn. Invite them to connect!
    </div>
    <div class="tab-pane" id="messages">
    
    <div style="width:100%;">
	   <div style="float:left;width:50%;">
	   <?php echo '<iframe width="80%" height="250" src="http://www.youtube.com/embed/UQA0wqXmDQc" frameborder="0" allowfullscreen></iframe>'; ?>
	   </div>
	   <div style="float:left;width:50%;margin-top:50px;">
	   <span style="font-size:25px;color:#888888;"><b>Save profiles to a convenient workspace</b></span><br/>
	    <span style="font-size:20px;">Create folders, add notes and view message history</span><br/><br/>
	    <a href="" class="btn btn-warning">Upgrade Now</a>
	   </div>  
    </div>
    
    <div style="width:100%;float:left;">
    <div style="width:25%;float:left;">    
        <h6>How it works</h6>
Profile Organizer includes several tools to help you keep track of important profiles.    
    </div>
     <div style="width:25%;float:left;">    
        <h6>Save with one click</h6>
        <?php echo $this->Html->image("mouse2.jpeg",array('height'=>'150px','width'=>'185px')); ?>
Track important profiles in a dedicated workspace.    
    </div>
     <div style="width:25%;float:left;">    
        <h6>Organize into folders</h6>
          <?php echo $this->Html->image("book.jpeg",array('height'=>'150px','width'=>'185px')); ?>
Organize profiles into your own personal folders.    
    </div>
     <div style="width:25%;float:left;">    
        <h6>Add notes & contact info</h6>
          <?php echo $this->Html->image("note.jpeg",array('height'=>'150px','width'=>'185px')); ?>
Keep important details that help you manage your outreach.
    </div> 
    </div>
    
    </div>
     
    <script type="text/javascript">
    $(function () {
    $('#myTab a:last').tab('show');
    $('#myTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
        })
    })
    </script>
    <!--------------------------------------------------------->
    </div>
   </div>    
 <div class="span4">
   <p><h5>People You May Know</h5></p><hr/>
	<?php foreach($srch as $all): if($all['User']['id'] != $user_id){ ?>
<div style="width:100%;">
       <a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'profile_view',$all['User']['id'])); ?>">
        <?php echo $this->Html->image('/files/profileimage/'.$all['User']['profile_image'],array('height'=>'50px','width'=>'50px','align'=>'left','hspace'=>'5','class'=>'img')); ?>
        </a>
        <p class="callback_<?php echo $all['User']['id']; ?>"><b><?php echo $all['User']['first_name']; ?>&nbsp;&nbsp;<?php echo $all['User']['last_name']; ?></b></p>
        <p><?php  foreach($experiance as $exp): if($exp['UserWorkSince']['user_id'] == $all['User']['id']){echo $exp['UserWorkSince']['exp_title']; break; }  endforeach; ?></p>
    </div><hr/><br/><br/>
 <script type="text/javascript">
$(document).ready(function () {
    
    var hoverHTMLDemoCallback = '<p><b>';
    hoverHTMLDemoCallback +=  '<?php echo $all['User']['first_name']; ?>&nbsp;&nbsp;<?php echo $all['User']['last_name']; ?>';
    hoverHTMLDemoCallback +=  '</b><br/> <?php echo $this->Html->image('/files/profileimage/'.$all['User']['profile_image'],array('height'=>'75px','width'=>'75px','align'=>'left','hspace'=>'5')); ?>';
    hoverHTMLDemoCallback +=  '<?php echo substr($all['User']['summary'],0,150)."....."; ?>';
	hoverHTMLDemoCallback +=  '<br/><a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'profile_view',$all['User']['id'])); ?>">View Profile</a>&nbsp;|&nbsp; <a href="#connect_<?php echo $all['User']['id']; ?>" data-toggle="modal" role="button">Invite to connect</a><p>';

    $(".callback_<?php echo $all['User']['id']; ?>").hovercard({
        detailsHTML: hoverHTMLDemoCallback,
        width: 350,
        cardImgSrc: '',
        onHoverIn: function () {
        	 $.notify('We see you just hovered over the label! <br/>Callback function <strong>"onHoverIn"</strong>. ', {
                     background: '#ffffbb',
                     autoHide: true,
                     autoHideDelay: 1000,
                     clickAnywhereToClose: true,
                     position: "bottom-right",
                     width: 100
                 });

        }
    });
});
</script>
 <!---------model------------>
    <div id="connect_<?php echo $all['User']['id'] ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <?php echo $this->Form->create('Connection',array('controller'=>'connections','action'=>'add')); ?>
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3 id="myModalLabel">&nbsp;&nbsp;<?php echo $this->Html->image("msg.png"); ?>Invite to connect on Academatch</h3>
</div>
<div class="modal-body">
<input type="hidden" name="data[Connection][user_id]" value="<?php echo $user_id ?>" />
<input type="hidden" name="data[Connection][connectedwith]" value="<?php echo $all['User']['id']; ?>" />
<input type="hidden" name="data[Connection][status]" value="1" />
        <div class="row-fluid">
            <div class="span4">How do you know him?</div>
            <div class="span4">
            <table>
            <tr><td><input type="radio" name="data[Connection][relation]" value="Colleague"/></td><td width="200">Colleague</td></tr>
             <tr><td><input type="radio" name="data[Connection][relation]" value="Classmate" /></td><td width="200">Classmate</td></tr>
              <tr><td><input type="radio" name="data[Connection][relation]" value="We've done business together"/></td><td width="200">We've done business together</td></tr>
               <tr><td><input type="radio" name="data[Connection][relation]"  value="Friend"/></td><td width="200">Friend</td></tr>
                <tr><td><input type="radio" name="data[Connection][relation]" value="Other"/></td><td width="200"> Other</td></tr>
                 <tr><td><input type="radio" name="data[Connection][relation]" value=" I don't know ashish"/></td><td width="200"> I don't know him</td></tr>
            </table></div>
        </div>
        <div class="row-fluid">
        <div class="span4">Include a personal note: (optional)</div>
           <div class="span4">           
             <textarea  name="data[Connection][notes]" rows="5" cols="10"></textarea>
           </div>
        </div>
       <span style="color:maroon;margin-left:75px;">Important:</span> Only invite people you know well and who know you. 
        
</div>
<div class="modal-footer">
<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
<button class="btn btn-primary" type="submit">Save changes</button>
</div>
</form>
</div>
    <!--------------------------->
       <?php } endforeach; ?>
        <i class="icon-hand-right"></i>&nbsp;&nbsp;<a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'other_people')); ?>">See More</a>
<?php echo $this->Html->script(array('jquery.hovercard')); ?>
   </div>
           				 
    
</div>
<?php  echo $this->element('footer');
 ?>