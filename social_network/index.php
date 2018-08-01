<?php require('inc/header.inc.php'); ?>
<?php
$servername = "localhost";
$username = "username";
$password = "password";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database
$sql = "CREATE DATABASE myDB";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();
?>
<div style="width: 1000px; margin: 0px auto 0px auto;">
	<table>
	<tr>
	<td width="60%" valign="top">
		<h2>Join Find Friends Today!</h2>
	</td>
	<td width="40%" valign="top">
		<h2>Sign Up Below.....</h2>
		<form action="#" method="POST">
			<input type="text" name="fname" size="25" placeholder="First Name"><br /><br />
			<input type="text" name="lname" size="25" placeholder="Last Name"><br /><br />
			<input type="text" name="username" size="25" placeholder="Username"><br /><br />
			<input type="text" name="email" size="25" placeholder="Email Address"><br /><br />
			<input type="text" name="email2" size="25" placeholder="Email Address (again)"><br /><br />
			<input type="text" name="password" size="25" placeholder="Password"><br /><br />
			<input type="text" name="password" size="25" placeholder="Password(again)"><br /><br />
			<input type="submit" name="submit" value="Sign Up!">
		</form>
	</td>
	</tr>
</table>
<?php require('inc/footer.inc.php'); ?>