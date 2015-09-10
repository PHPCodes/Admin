<!--third section -->
	<div class="row-fluid" style="background-color:#5b595b;">
    <div class="span8" id="bgcolor">
	  
	  <div class="span8">
             
				   <p class="footer">
<!--                            <a href="<?php //echo $this->Html->url(array('controller'=>'staticpages','action'=>'about_us')); ?>">  About Academatch </a> |   -->                                     
<!--                            <a href="<?php //echo $this->Html->url(array('controller'=>'ads','action'=>'index')); ?>">  Advertising </a> <br/>-->
                                        <?php foreach($static as $page): ?>
                                       <a href="<?php echo $this->Html->url(array('controller'=>'staticpages','action'=>'page',$page['Staticpage']['title'])); ?>"><?php echo $page['Staticpage']['title']; ?></a> | 
                                      
                                   <?php endforeach; ?>    &copy; Academatch Ltd. 2013
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
                 <div class="span4">Industry</div>
                <div class="span4"><input type="text" name="category" placeholder="Industry"/></div>
             </div>
            <div class="row-fluid">
                <div class="span4">Organisation</div>
                <div class="span4"><input type="text" name="company" placeholder="Organisation"/></div>
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
<!---------------------------advance Grant search--------------------------------------------------->
 <div id="advancegrant" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <?php echo $this->Form->create('Grant',array('action'=>'grant_result')); ?>
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Advanced Search</h3>
    </div>
    <div class="modal-body">
             <div class="row-fluid">
                <div class="span4">Title</div>
                <div class="span4"><input type="text" name="title" placeholder="Title"/></div>
             </div>
            <div class="row-fluid">
                <div class="span4">Department</div>
                <div class="span4"><input type="text" name="department" placeholder="Department"/></div>
             </div>
             <div class="row-fluid">
                 <div class="span4">Salary</div>
                <div class="span4"><input type="text" name="salary" placeholder="Salary"/></div>
             </div>
            <div class="row-fluid">
                <div class="span4">Keyword</div>
                <div class="span4"><input type="text" name="keyword" placeholder="keyword"/></div>
             </div>            
            <div class="row-fluid">
                <div class="span4">Grade</div>  
                <div class="span4"> <input type="text" name="grade" placeholder="grade"/></div>
             </div>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        <button type="submit" class="btn btn-primary" name="advance">Search</button>
    </div>
 </form>
</div>