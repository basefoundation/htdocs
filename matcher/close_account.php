<?php 
include( "./inc/connect.inc.php" );
session_start();
if(!isset($_SESSION["user_login"])) {
  $user="";
} else {
  $parts = explode("@", $_SESSION["user_login"]);
  $user = $parts[0];
} 
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
        <meta name="Description" CONTENT="Author: A.N. Author, Illustrator: P. Picture, Category: Books, Price:  £9.24, Length: 784 pages">
              <meta name="google-site-verification" content="+nxGUDJ4QpAZ5l9Bsjdi102tLVC21AIh5d1Nl23908vVuFHs34="/>
                     <meta name="robots" content="noindex,nofollow">
                            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                                   <meta name="viewport" content="width=device-width,initial-scale=1">
                                            <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
                                                 <link rel="stylesheet" type="text/css" href="./css/style.css">
                                                        <title><img src="img/nomoke.jpg">nomoke</title>
<script type="text/javascript" src="./js/main.js"></script> 
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container">
    <div class="row">
      <div class="col-sm-8">
        <ul class="nav nav-tabs">
      <li role="presentation" ><a href="home.php"><img src="img/nomoke.jpg" title="" style="height: 30px; width: 30px"></a></li>
      <li role="presentation" class=""><a href="home.php">Home</a></li>
      <li role="presentation" ><a href="matched.php">MATCHED</a></li>
            <li role="presentation" ><a href="chat.php">CHAT</a></li>
            <li role="presentation" ><a href="profile.php">Me</a></li>
</div>
<div class="col-sm-4" >
  <ul class="nav navbar-nav navbar-right">
  <form class="navbar-form navbar-left">
  <div class="input-group">
    <!--<input type="text" class="form-control" placeholder="Search by user_id" disabled="disabled"> -->
    <div class="input-group-btn">
      <!--<button class="btn btn-success" type="submit" disabled="disabled">GO
     </button>-->
    </div>
  </div>
</form>
    <!--  <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>-->
      <li><a href="logout.php">Logout</a></li>
    </ul>
</div>


      </div>
    </div>
      
    </nav>
<?php
//Take the user back
if ($user) {
if (isset($_POST['no'])) {
 header("Location: profile.php");
}
if (isset($_POST['yes'])) {
$close_account = mysql_query("UPDATE users SET closed='yes' WHERE username='$user'");
echo "Your Account has been closed!";
session_destroy();
header("Location: login.php");
}
}
else
{
 die ("You must be logged in to view this page!");
}
?>
<br />
<center>
<form action="close_account.php" method="POST">
Are you sure you want to close your account?<br>
<input type="submit" name="no" value="No, take me back!">
<input type="submit" name="yes" value="Yes I'm sure">
</form>
</center>
<?php include( "./inc/footer.inc.php" ); ?>