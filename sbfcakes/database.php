<?php
$dbhost = 'localhost';
$username = 'root';
$password = '';
$db = "periston";
$dbcon = mysqli_connect("$dbhost","$username","$password"); 
mysql_select_db($db);
echo "connected to database ";
?>
