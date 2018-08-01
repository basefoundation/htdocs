<?php
include ( "./inc/connect.inc.php" );
session_start();
if(!isset($_SESSION["user_login"])) {
	$user="";
} else {
	$user = $_SESSION["user_login"];
}
$post = $_POST['post'];
if($post != "") {
	$date_added = date("Y-m-d");
	$added_by = $user;
	$user_posted_to = "test123";
	$sqlCommand = "INSERT INTO posts VALUES('','$post','$date_added','$added_by','$user_posted_to')";
	$query = mysql_query($sqlCommand) or die (mysql_error());
}
else {
	echo "You must enter something in the post field before you can send it ...";
}
?>