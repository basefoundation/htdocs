<?php
if(isset($_POST['submitted'])) {
include('ordernow_mysql.php');
$name = $_POST['name'];
$email = $_POST['email'];
$phoneno = $_POST['phoneno'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$pincode = $_POST['pincode'];
$cakewrite = $_POST['cakewrite'];
$sqlinsert = "INSERT INTO ordernow (name,email,phoneno,address,city,state,pincode,cakewrite)  VALUES ('$name','$email', '$phoneno','$address','$city','$state','$pincode','$cakewrite')";

if (!mysqli_query($dbcon,$sqlinsert)) {
	die('error inserting new record');
}
$newrecord = "I record added to the data base";
}
?>
<div class="form-group">
<section class="col-sm-6">
		<form method="post" action="buynow1.php">
		<input type="hidden" name ="submitted" value="true" />
			<div class="form-group">
	<h1>Order Now!!</h1>
		<label for="inputName">Name</label>
		<input class="form-control" type="text" name="name" id="inputName" placeholder="Name"></input>
		</div>
		<div class="form-group">
	 	<label for="inputEmail">Email</label>
		<input class="form-control" type="email" name="email" id="inputEmail"
		placeholder="Email"></input>
		<div class="form-group">
		<label for="inputPhoneno">Phone No</label>
		<input class="form-control" type="phoneno" name="phoneno" id="inputPhoneno" placeholder="eg-9501318198"></input>
		</div>
		<div class="form-group">
		<label for="inputAddress">Address</label>
		<input class="form-control" type="address" name="address" id="inputAddress" placeholder="eg-kabir park"></input>
		</div>
		<div class="form-group">
		<label for="inputCity">City</label>
		<input class="form-control" type="city" name="city" id="inputCity" placeholder="eg-Amritsar"></input>
		</div>
		<div class="form-group">
		<label for="inputState">State</label>
		<input class="form-control" type="state" name="state" id="inputState" placeholder="eg-Punjab"></input>
		</div>
		<div class="form-group">
		<label for="inputPincode">Pin Code</label>
		<input class="form-control" type="pincode" name="pincode" id="inputPincode" placeholder="eg-143005"></input>
		</div>
		<div class="form-group">
		<label for="inputcakeWrite">Want to write something on cake</label>
		<input class="form-control" type="cakewrite" name="cakewrite" id="inputcakeWrite" placeholder="eg-happy birthday rohan"></input>
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
		<input type="submit" value="Order Now"></input><p>(+40 delivery charges)</p>
</form>
	</section>
	</div>