<?php
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'a_database';
$conn = mysqli_connect($mysql_host,$mysql_user,$mysql_pass,$mysql_db);
if (!$conn) {
	die(mysql_error());
}
?>