<?php header('Content-Type: text/plain'); 
echo '<'.'?xml version="1.0" encoding="UTF-8"?'.'>'; ?> 
<Category>
<Details success="True" />
<?php  foreach($contents as $block){  ?>
<Detail id="<?php echo $block['id']; ?>" name="<?php echo $block['name']; ?>" image="<?php echo FULL_BASE_URL.$this->webroot; ?>files/categoryimage/<?php echo $block['id'].$block['image']; ?>"/>
<?php }  ?>
</Category>