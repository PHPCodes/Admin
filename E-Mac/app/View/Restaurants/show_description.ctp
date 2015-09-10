<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
<style>

body {
    background-color: #ffffff;
   
}

.iphone-dynmic-content
{
    margin: 0 auto;
    width: 96%;
}
.iphone-dynmic-content > p
{
font-size:15px !important;
}
.iphone-dynmic-content p img
{
	border: 1px solid #dedada;
    margin: 8px !important;
    padding: 5px !important;
	max-width:100% !important;
	border: 0px none !important;
}
@media only screen and (max-width:640px){
.iphone-dynmic-content p img
{
	border: 0px none !important;
    margin:10px 0 !important;
    padding: 1% !important;
	max-width:98% !important;
}
}
@media only screen and (max-width:480px){
.iphone-dynmic-content p img
{
	max-width:97% !important;
	border: 0px none !important;
}
}
</style>
<div class="iphone-dynmic-content">
<?php echo $data ;?>
</div>