<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts.Emails.text
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<?php //echo $this->fetch('content');?>


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
	<title><?php echo $title_for_layout;?></title>
</head>
<body>
    <div style="width: 100%; border: 1px solid black;">
            <div style="width: 100%; height: 50px; background: #5A6163;">
                <img src="http://acadm.apnaphp.com/img/ss_44.png" style="height: 50px"/>
            </div> 
            <div style="width: 100%;padding:50px;">
                 <?php echo $this->fetch('content');?>            
            </div>
            <div style="width: 100%; height: 50px; background: #5A6163;color:white;">
               <p><b>Regards</b></p>
                <p>The Academatch Admin Department</p>
                <p>If you need to contact us please email <a href="mailto:admin@academatch.com">admin@academatch.com</a></p> 
            </div>
        </div>
    
	

    
</body>
</html> 

