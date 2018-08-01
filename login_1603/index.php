<?php
session_start();   
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<title>Title of the document</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form  action="login.php" method="POST">
	<input type="text" name="uid" placeholder="Username"><br>
	<input type="password" name="pwd" placeholder="Password"><br>
	<button type="submit">
		SIGN UP
	</button>
</form>
<?php
if(isset($_SESSION['id'])) {
	echo $_SESSION['id'];
} else {
	echo "You are not logged in!";   
}


?>
<br><br><br>
<form action="signup.php" method="POST">
	<input type="text" name="first" placeholder="Firstname"><br>
	<input type="text" name="last" placeholder="Lastname"><br>
	<input type="text" name="uid" placeholder="Username"><br>
	<input type="password" name="pwd" placeholder="Password"><br>
	<button type="submit">
		SIGN UP
	</button>
</form>
<br><br><br>
<form  action="logout.php" >
	<button>
		LOG OUT
	</button>
</form>
</body>
</html>