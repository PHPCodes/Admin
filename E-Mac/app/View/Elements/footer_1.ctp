<!--third section -->
	<div class="row-fluid" style="background-color:#5b595b;">
    <div class="span8" id="bgcolor">
	  
	  <div class="span8">
             
				   <p class="footer">
<!--                            <a href="<?php //echo $this->Html->url(array('controller'=>'staticpages','action'=>'about_us')); ?>">  About Academatch </a> |   -->                                     
<!--                            <a href="<?php //echo $this->Html->url(array('controller'=>'ads','action'=>'index')); ?>">  Advertising </a> <br/>-->
                                        <?php foreach($static as $page): ?>
                                       <a href="<?php echo $this->Html->url(array('controller'=>'staticpages','action'=>'page',$page['Staticpage']['title'])); ?>"><?php echo $page['Staticpage']['title']; ?></a> | 
                                      
                                   <?php endforeach; ?> l  <a href="/Categories/post_category">Posts Directory</a>  &copy; Academatch Ltd. 2013
<!--                                       <a href="/Categories/company_category">Companies Directory</a> l-->
                                     
                                   </p>
	</div>
	  
	</div>
    <div class="span4" id="hide">
	     
	<div id="bgcolor">
	    
		<div id="bgcolor" align="right"><?php echo $this->Html->image('footer.jpg'); ?></div>		

	</div>
	</div>
	</div>
</div>
</div>
</body>
<script>
  $(function() {
  // Setup drop down menu
  $('.dropdown-toggle').dropdown();
 
  // Fix input element click problem
  $('.dropdown input, .dropdown label').click(function(e) {
    e.stopPropagation();
  });
});
</script>
<?php echo $this->Html->script(array('jquery.form')); ?>
                        <script type="text/javascript">
                            $(document).ready(function(e){
                                $('#frmreg').ajaxForm({
                                    uploadProgress: function(event, position, total, percentComplete) {
                                        $('#upPRc').html('<img src="https://www.caritas.us/sites/default/files/images/misc/loading.gif"/>');
                                        
                                    },
                                    complete: function(xhr) {
                                        $('#upPRc').html('');
                                    },
                                    success: function(data){
                                        console.log(data);
                                        d = JSON.parse(data);
                                        console.log(d);
                                        if(d.error == 1){
                                            //$('.fileupError').html(d.message);
                                            $('.fileupErrordetection').html(d.message);
                                        }else if(d.error == 0){
                                            $('.fileupSuccess').html(d.message);
                                        }
                                    }
                                });
								
                            });
                        </script>
                     <script>
  $(function() {
  // Setup drop down menu
  $('.dropdown-toggle').dropdown();
 
  // Fix input element click problem
  $('.dropdown input, .dropdown label').hover(function(e) {
    e.stopPropagation();
  });
});
$('.mypopover').popover({
   // other options here
   content: function(ele) { return $('#popover-content').html(); }
});
   // $('#myModal').modal({
//    keyboard: false
//    })
</script>
<script type='text/javascript'>
    $(document).ready(function() {
      
	 $(".alu").validate();
    });
   </script>
<!---------------------------advance post search--------------------------------------------------->
 <div id="advance" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <?php echo $this->Form->create('PostJob',array('action'=>'find_job')); ?>
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Advanced Search</h3>
    </div>
    <div class="modal-body">
        <div class="row-fluid">
            <div class="span12">
            <div class="span6">
                <b>Country</b>
                <select name="data[PostJob][country_id]">
                             <?php foreach($con as $key){ ?>
                            <option value="<?php echo $key['Country']['CountryId'];?>"><?php echo $key['Country']['CountryName']; ?></option>
                            <?php } ?>
                        </select>
            </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12"> 
                <div class="span6">                 
                    <b>Field</b>
                    <div style="width:250px;height:100px;overflow:auto; border:inset;" id="dvContent">
                                           <ul style="list-style:none;" id="checkAll">
<!--                                               <li><input title="Select All" class="tool-tip" id="titleCheck" name="titleCheck" type="checkbox" class="checkAll"></li>-->
                    <?php foreach($category as $cat){ ?>
                     <li>
                      <span><?php echo $this->Form->checkbox("inb"+$cat['Category']['id'],array('value' => $cat['Category']['id'],'class'=>'checkAll')); ?>
                   <?php echo $cat['Category']['name']; ?>
                      </li> 
                    <?php  } ?>   
                                           </ul>
                    </div>
                </div>
                <div class="span6">
                      <b>Discipline</b>
                      <div style="width:250px;height:100px;overflow:auto; border:inset;" id="dvContent">
                                           <ul style="list-style:none;" id="checkAll">
<!--                                               <li><input title="Select All" class="tool-tip" id="titleCheck" name="titleCheck" type="checkbox" class="checkAll"></li>-->
                                               <?php foreach($function as $fun){ ?>
                                               <li>
                                                   <span style="margin:5px;"><?php echo $this->Form->checkbox("inb"+$fun['JobFunction']['id'],array('value' => $fun['JobFunction']['id'],'class'=>'checkAll')); ?></span><?php echo $fun['JobFunction']['title']; ?>
                                               </li>
                                               <?php } ?>                          
                                           </ul>
                        </div>
                     
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
<!--        <a style="float:left;" href="<?php //echo $this->Html->url(array('controller'=>'PostJobs','action'=>'advance_search')); ?>"><i class="icon-search"></i>More Options</a>-->
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        <button class="btn btn-primary">Save changes</button>
    </div>
 </form>
</div>