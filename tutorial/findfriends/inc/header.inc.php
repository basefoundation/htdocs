<?php include("./inc/connect.inc.php"); ?>
<?php
session_start();
if(!isset($_SESSION["user_login"])) {
$username="";
}
else { 
//header("location: home.php");
	$username=$_SESSION["user_login"];
}
$get_unread_query = mysql_query("SELECT opened FROM pvt_messages WHERE user_to='$username' && opened='no'");
$get_unread = mysql_fetch_assoc($get_unread_query);
$unread_numrows = mysql_num_rows($get_unread_query);
$unread_numrows = "(".$unread_numrows.")";
?>
<!doctype html>
<html> 
<head>
	<title>find friends </title>
	<link rel="stylesheet" media="screen" href="css/reset.css"  >
	<link rel="stylesheet" media="screen" href="css/master.css"  >
	<link rel="stylesheet" media="screen" href="css/blue.css"  >
	<link rel="stylesheet" media="screen" href="css/main.css"  >
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script src="js/jquery.color.js"></script>
	<script src="js/script.js"></script>
	<script src="js/placeholder-js.js" type="text/javascript"></script>
	<script src="js/main.js" type="text/javascript"></script> 
	<link rel="stylesheet" type="text/css" href="./css/style.css"/>

</head>
<body>
<div class="headerMenu">
	<div id="wrapper">
		<div cl ass="logo">
			<img src="./img/find_friends_logo.png" />
		</div>
		<div class="search_box">
			<form action="search.php" method="GET" id="search">
			<input type="text" name="q" size="60" placeholder="Search...."/>
				
			</form>
		</div>
		<?php
		if(!$username) {
		echo '<div id="menu">
			<a href="index.php">Home</a>
			<a href="#">About</a>
			<a href="index.php">Sign Up</a>
			<a href="index.php">Sign In</a>
		
		</div>';	
		}
		else {
			echo '<div id="menu">
			<a href="'.$username.'">Profile</a>
			<a href="account_setting.php" class="flink">Account Setting</a>
			<a href="my_messages.php" class="flink">My Messages ' . $unread_numrows . '</a>
			<a href="my_pokes.php" class="flink" >Pokes</a>
			<a href="logout.php" class="flink">Logout</a>		
		</div>';
		}
		?>
	</div>
</div>  
<!--<div class="feat">
				<form id="searchForm">
                <fieldset>
                    <div class="input">
                        <input type="text" class="Search" id="s" value="Search findFriends ..." />
                    </div>
                    <input type="submit" id="searchSubmit" value="" />
                </fieldset>
            </form>
</div>
--><!-- end fnav feat -->
  <div id="wrapper">
<br />
<br />
<br />
<br /> 