<?php
if (isset($_POST['username']) && isset($_POST['password'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password_hash = md5($password);
	if (!empty($username) && !empty($password)) {
		$query = "SELECT 'id' FROM users WHERE 'username' = '$username' AND 'password' = '$password_hash'";
		if($query_run = mysqli_query($conn,$query)){
			$query_num_rows = mysqli_num_rows($query_run);
			echo $query_num_rows;

			if ($query_num_rows==0) {
				echo 'Invalid username/password combination.';
			} else if($query_num_rows==1){
				echo 'ok.';
                  
			}

		}

	} else {
		echo 'You must supply a username and password.';
	}
}
?>
<form action="<?php echo $current_file; ?>" method="POST">
Username: <input type="text" name="username">
Password: <input type="password" name="password">
<input type="submit" value="Log in">
</form>