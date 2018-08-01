<?php
DEFINE ('DB_USER','89dbuser1');
DEFINE ('DB_PSWD','dbpass1');
DEFINE ('DB_HOST','db1.webdev.cocc-webdev.org');
DEFINE ('DB_NAME','webdev89db1');
$dbcon = mysqli_connect(DB_HOST,DB_USER,DB_PSWD,DB_NAME);
if (!$dbcon) {
	die('error connecting to data base');
}
echo 'you have connected sucessfully';
?>