
<?php include('header.php') ?>
<?php
if(isset($_POST['submitted'])) {

include('contactus-mysql.php');
$name = $_POST['name'];
$email = $_POST['email'];
$phoneno = $_POST['phoneno'];
$comments = $_POST['comments'];
$sqlinsert = "INSERT INTO contactus (name,email,phoneno,comments) VALUES ('$name','$email', '$phoneno','$comments')";

if (!mysqli_query($dbcon,$sqlinsert)) {
	die('error inserting new record');
}
$newrecord = "I record added to the data base";
}
?>
		<div class="container">
			<div class="row">
				<section class="col-sm-5">
		<img src="../img/address.jpg" alt="Dr Winthop Photo" class="img-thumbnail img-responsive center-block">
	</section>
	<section class="col-sm-2"><h1 class="text-center">OR</h1>
	</section>
	<section class="col-sm-5">
		<form method="post" action="contactus.php">
		<input type="hidden" name ="submitted" value="true" />
	<div class="form-group">
		<label for="inputName">Name</label>
		<input class="form-control" type="text" name="name" id="inputName" placeholder="Name"></input>
		</div>
		<div class="form-group">
	 	<label for="inputEmail">Email</label>
		<input class="form-control" type="email" name="email" id="inputEmail"
		placeholder="Email"></input>
		<div class="form-group">
		<label for="inputName">Phone No</label>
		<input class="form-control" type="phoneno" name="phoneno" id="inputName" placeholder="eg-9501318198"></input>
		</div>
		<label for="inputComments">Comments</label>
		<textarea class="form-control" type="comments" name="comments" id="inputComments"></textarea>
		</div>
		<input type="submit" value="submit"></input>
	</section>
			</div>
		</div>
		</div>
		</div>
		<?php include('footer.php') ?>