<?php 
session_start();
if(!isset($_SESSION['id'])) {
	header("Location: login.php");
}
include_once("db.php");
if(isset($_POST['name_first']) && isset($_POST['name_last'])) {
	if($_POST['name_first'] != "" && $_POST['name_last'] !="") {
		$first = $_POST['name_first'];
		$last = $_POST['name_last'];
		$sql_store = "INSERT into names (id,first,last) VALUES (NULL,'$first','$last')";
		$sql = mysqli_query($db,$sql_store) or die(mysql_error());
		echo "You entered $first $last into the database.";
	} else {
		echo "You need to enter data in both boxes.";
	}
} else {
	echo "You need to enter data in both boxes.";
}
?>