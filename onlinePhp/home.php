<?php 
mysql_connect("localhost","root","") or die("Couldn't connect to SQL server");
mysql_select_db("findfriend") or die("Couldn't select DB");
session_start();
if(!isset($_SESSION["user_login"])) {
	$user="";
} else {
	$user = $_SESSION["user_login"];
} 
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
if (!isset($_SESSION["user_login"])) {
    echo "sorry";
}
else
{
	$reg=@$_POST['reg'];
 //declearing variables to prevent errors
 $fn = "";
 $fn = strip_tags(@$_POST['data']);
 if (mysql_errno()) { 
    die('Invalid query: ' . mysql_error());
}
else {
	if($reg) {
		//echo $reg;
		//echo $fn;
		//echo $user;
		$qury = mysql_query("INSERT INTO `match` VALUES ('','$user','$fn')");
		$result = mysql_query("SELECT name,data FROM `match` WHERE data=1");
        $storeArray = Array();
        while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        // $storeArray[] =  $row['names'];  
         echo $row['name'];
         echo "<br />";
}
 		die(mysql_error());
}
}
}	
?>
<form action="home.php" method="POST">
	<input type='text' name='data' />
	<input type='submit' name='reg' />
	<a href="logout1.php">Logout</a>
</form>
</body>
</html>