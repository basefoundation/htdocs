<?php
DEFINE ('DB_USER','shankar7570');
DEFINE ('DB_PSWD','7570@Bhuiop');
DEFINE ('DB_HOST','');
DEFINE ('DB_NAME','sbfcakes');
$dbcon = mysqli_connect(DB_HOST,DB_USER,DB_PSWD,DB_NAME);
if (!$dbcon) {
	die('error connecting to data base');
             }
echo '<h1 class="text-danger" >thanks for registration we contact you soon</h1>';
?>