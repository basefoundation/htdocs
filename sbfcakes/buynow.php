<?php include('header.php') ?>
<?php
if(isset($_POST['submitted'])) {

include('buynow_mysql.php');
$name = $_POST['name'];
$email = $_POST['email'];
$phoneno = $_POST['phoneno'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$pincode = $_POST['pincode'];
$sqlinsert = "INSERT INTO buynow (name,email,phoneno,address,city,state,pincode) VALUES ('$name','$email', '$phoneno','$address','$city','$state','$pincode')";

if (!mysqli_query($dbcon,$sqlinsert)) {
	die('error inserting new record');
}
$newrecord = "I record added to the data base";
}
?>
<form method="post" action="buynow.php">
<input type="hidden" name ="submitted" value="true" />
	<div class="form-group has-warning">
		<label for="inputName">Name</label>
		<input class="form-control" name="name" type="text" id="inputName" placeholder="Name"></input>
	</div>
	<div class="form-group has-warning">
		<label for="inputEmail">Email</label>
		<input class="form-control" name="email"type="email" id="inputEmail" placeholder="Email"></input>
	</div>
	<div class="form-group has-warning">
		<label for="inputPhone">Phone No</label>
		<input class="form-control" name="phoneno" type="phoneno" id="inputPhone" placeholder="eg-9501318198"></input>
	</div>
	<div class="form-group has-warning">
		<label for="inputAddress">Address</label>
		<input class="form-control" name="address" type="address" id="inputAddress" placeholder="eg-kabir  park"></input>
	</div>
	<div class="form-group has-warning">
		<label for="inputCity">City</label>
		<input class="form-control" name="city" type="city" id="inputCity" placeholder="eg-amritsar"></input>
	</div>
	<div class="form-group has-warning">
		<label for="inputState">State</label>
		<input class="form-control" name="state" type="state" id="inputState" placeholder="eg-punjab"></input>
	</div>
	<div class="form-group has-warning">
		<label for="inputPincode">Pin Code</label>
		<input class="form-control" name="pincode" type="pincode" id="inputPincode" placeholder="eg-143005"></input>
	</div>
	<div class="form-group">
	<div class="checkbox">
		<label>
			<input id="inputAddList" type="checkbox">
				COD(Cash On Delivery)
			</input>
		</label>
		</div>
	</div>
	<div class="form-group">
			<input type="submit" class="btn btn-default" value="order now">
	</input>
		</div>
</form>

<?php include('footer.php') ?>