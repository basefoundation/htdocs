<?php
DEFINE ('DB_USER','root');
DEFINE ('DB_PSWD','');
DEFINE ('DB_HOST','localhost');
DEFINE ('DB_NAME','ordernow');
$dbcon = mysqli_connect(DB_HOST,DB_USER,DB_PSWD,DB_NAME);
if (!$dbcon) {
	die('error connecting to data base');
}
 echo '<h1 class="text-center" >Your order no is 123456 </h1>' ;
echo '<h1 class="text-center" >Total payble amount is RS 500/ only </h1>';
echo '<h1 class="text-center" >thankyu for shopping with us</h1>';
?>