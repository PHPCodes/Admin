<style type="text/css">
a:hover { text-decoration: underline !important; }
    tr {
  font-family: arial;
  font-size: 15px;
  font-weight: normal;
  line-height: 27px;
}
 .address p a {
  color: #006085;
}   
</style>
<!--100% body table-->
<table cellspacing="0" border="0" cellpadding="0" style="margin: 5% auto;
  width: 800px;">
<tr>
<td>
<!--top links-->

<!--header-->
    <table bgcolor="#c72439"   width="100%" border="0" align="center" cellpadding="0"  style="background-position: center; background-color: #d7d7d7;" >
        <tr>
            <td valign="top" width="100%">
            <!--ribbon-->
                <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td valign="top" style="float:left;   margin: 10px;" >
                            <img src="<?php echo $this->webroot.'assets/img/login-logo.png'; ?>" alt="Logo">
                        </td>
                    </tr>
                </table><!--ribbon-->
            </td>
        </tr>
    </table><!--/header-->
<!--email container-->
    <table bgcolor="#f8f8f8" cellspacing="0" border="0" align="center" cellpadding="30" width="100%">
        <tr>
            <td>
            <!--email content-->
                <table cellspacing="10" border="0" id="email-content" cellpadding="0" width="100%">
					<?php
						$content = explode("\n", $content);

						foreach ($content as $line):
						echo $line . "\n";
						endforeach;
					?>
                    <tr> 
                        <td><b>Regards </b> </td>
                    </tr>
                     <tr> 
                        <td> Crowd Career App</td>
                    </tr>
                   
                </table>              
            </td>
        </tr>
    </table>   
    
<!--footer-->
<table width="800" border="0" align="center"bgcolor="#3790BC" cellpadding="0" cellspacing="0">
<tr>
<td valign="top" class="address"><p style="color: #fff;
  font-size: 15px;
  line-height: 45px;
  text-align: center;
  width: 100%;">If you need to contact us please email <a href="#">admin@crowdcareer.com</a></p>
</td>
</tr>

</table><!--/footer-->
</td>
</tr>
</table><!--/100% body table-->