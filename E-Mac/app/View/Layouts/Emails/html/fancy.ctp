<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title_for_layout;?></title>
</head>

<body>
<!--<div style="background-color:#F17979; font-family:Arial Black,Gadget,sans-serif;color:#666;text-shadow:rgba(0,0,0,0.5);" align="center">-->
<br />
<br />
<div align="left" style="-webkit-border-radius: 10px; background:#orange; padding:10px; border-radius: 10px; -webkit-box-shadow:  2px 2px 5px 5px #FFF; box-shadow:  2px 2px 5px 5px #FFF; min-height:350px; width:680px; margin: 20px auto;">
<?php echo $this->fetch('content');?>
</div>
<br /><br /><br /><br /><br /><br />
<!--</div>-->
</body>
</html> 