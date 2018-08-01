<?php
session_start();   
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <?php include('header.php'); ?>
</head>                                                        
<body>
        <?php include('nav_withlogin.php');?>
        
		<?php include('matchnow.php'); ?>
	<?php include('onlinenow.php'); ?>
	<?php
if(isset($_SESSION['id'])) {
	echo $_SESSION['id'];
} else {
	echo "You are not logged in!";   
}
?>
		<?php include'footer.php'; ?>