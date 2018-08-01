<?php 
include( "./inc/connect.inc.php" );
session_start();
if(!isset($_SESSION["user_login"])) {
	$user="";
} else {
	$user = $_SESSION["user_login"];
} 
$get_unread_query = mysql_query("SELECT opened FROM pvt_messages WHERE user_to='$user' && opened='no' ");
$get_unread=mysql_fetch_assoc($get_unread_query);
$unread_numrows = mysql_num_rows($get_unread_query);
$unread_numrows="(".$unread_numrows.")";
//echo $unread_numrows;
?>
<!DOCTYPE html>
<html>
<head>
	<title>FindFriends</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css"/>
<script type="text/javascript" src="js/main.js"></script>	
</head>
<body>
<div class="headerMenu">
	<div id="wrapper">
		<div class=" logo">
			<img src="./img/find_friends_logo.png"/>
		</div>
		<div class="search_box" >
			<form action="search.php" method="GET" id="search">
				<input type="text" name="q" size="60" placeholder="Search ..."/>
			</form>
		</div>
		<?php
		if (!$user) {
		echo '<div id="menu">
			<a href="#">Home</a>
			<a href="#">About</a>
			<a href="index.php">Sign up</a>
			<a href="index.php">Sign in </a>
		</div>';
} else {
	echo '<div id="menu">
			<a href="'.$user.'">Profile</a>
			<a href="account_settings.php">Account Setting</a>
			<a href="my_messages.php">My Messages' . $unread_numrows . '</a>
			<a href="my_pokes.php">Pokes</a>
			<a href="logout.php">logout</a>
</div>';
}
?>
	</div>
</div>