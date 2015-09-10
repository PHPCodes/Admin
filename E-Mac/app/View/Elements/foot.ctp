<!--third section -->
	<div class="row-fluid" style="background-color:#5b595b;">
    <div class="span8" id="bgcolor">
	  
	  <div class="span8">
             
				   <p class="footer">
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
   <?php echo $this->Form->create('PostJob',array('action'=>'job_search')); ?>
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Advanced Search</h3>
    </div>
    <div class="modal-body">
             <div class="row-fluid">
                <div class="span4">Keywords</div>
                <div class="span4"><input type="text" name="keyword" placeholder="Keywords"/></div>
             </div>
            <div class="row-fluid">
                <div class="span4">Post title</div>
                <div class="span4"><input type="text" name="title" placeholder="Job title"/></div>
             </div>
            <div class="row-fluid">
                <div class="span4">Organisation</div>
                <div class="span4"><input type="text" name="category" placeholder="Organisation"/></div>
             </div>            
            <div class="row-fluid">
                <div class="span4">Country</div>  
                <div class="span4"> <input type="text" name="country" placeholder="Country"/></div>
             </div>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        <button type="submit" class="btn btn-primary" name="advance">Search</button>
    </div>
 </form>
</div>