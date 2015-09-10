<?php echo $this->element('top-header'); ?>
<div class="row-fluid" style="padding-top:5px;">  
       <div class="span12">
         <div class="top well">    
             <h3>Post Directory</h3><hr/>
             <h4> Browse by Industry </h4><br/>
             <div class="row-fluid">
                 <ul style="list-style:none;">
                     <?php foreach($categories as $cate): ?>
                     <li><a href="<?php echo $this->Html->url(array('controller'=>'Countries','action'=>'post_location',$cate['Category']['id'],$cate['Category']['name'])) ?> "> <?php echo $cate['Category']['name']; ?> </a></li>
                     <?php endforeach; ?>
                 </ul>
             </div>
       </div>
       </div>
</div>

<?php echo $this->element('footer'); ?>		 