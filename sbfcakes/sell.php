<?php include('header.php') ?>
<h1 class="text-center">Put Your Business Online</h1>
<?php
if(isset($_POST['submitted'])) {

include('sell-mysql.php');
$name = $_POST['name'];
$email = $_POST['email'];
$phoneno = $_POST['phoneno'];
$sqlinsert = "INSERT INTO sbfdatabase (name,email,phoneno) VALUES ('$name','$email','$phoneno')";

if (!mysqli_query($dbcon,$sqlinsert)) {
	die('error inserting new record');
}
}
?>
		<h3>Register Now</h3>
		<form method="post" action="sell.php">
		<input type="hidden" name ="submitted" value="true" />
	<div class="form-group">
		<label for="inputName">Name</label>
		<input class="form-control" type="text" name="name"  id="inputName" placeholder="Name"></input>
		</div>
		<div class="form-group">
	 	<label for="inputEmail">Email</label>
		<input class="form-control" type="email" name="email" id="inputEmail"
		placeholder="Email"></input>
		</div>
		<div class="form-group">
		<label for="inputPhone">Phone No</label>
		<input class="form-control" type="phoneno" name="phoneno" id="inputPhone" placeholder="eg-9501318198"></input>
		</div>
		<div class="form-group">
		<input type="submit" value="submit">
			</input>
			</div>
		
		</form>
		</div>
		</div>
		<?php include('footer.php') ?>