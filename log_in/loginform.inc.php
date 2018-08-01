<?php
if (isset($_POST['username']) && isset($_POST['password'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if (!empty($username) && !empty($password)) {
		echo 'ok..';
	} else {
echo 'you must supply a username and password.';
	}
}
?>
<form action="<?php echo $current_file;?>" method="POST">
	Username: <input type="text" name="username">
	password: <input type="password" name="password">
	<input type="submit" value="Log in">
</form>