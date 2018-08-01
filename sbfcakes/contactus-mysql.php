<?php
DEFINE ('DB_USER','root');
DEFINE ('DB_PSWD','');
DEFINE ('DB_HOST','localhost');
DEFINE ('DB_NAME','contactus');
$dbcon = mysqli_connect(DB_HOST,DB_USER,DB_PSWD,DB_NAME);
if (!$dbcon) {
	die('error connecting to data base');
}
echo '<h1 class="text-center">thanks for feedback we contact you soon</h1>';
?>