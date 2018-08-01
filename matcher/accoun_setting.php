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
  
    </ul>
</div>
</div>
    </div>
      
    </nav>
<div class="container">
  <div class="row">
    <div class="form-group">
    <p>UPLOAD YOUR PROFILE PHOTO:</p>
<form action="" method="POST" enctype="multipart/form-data">
<img src="<?php echo $profile_pic; ?>" width="70" /><br /><br />
<input type="file" name="profilepic"><br />
<input type="submit" name="uploadpic" value="Upload Image">
</form>
</div>
<hr /> 
<div class="form-group"> 
<form action="profile.php" method="post">
<p>CHANGE YOUR PASSWORD:</p> <br />
Old Password :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="oldpassword" id="oldpassword" size="39"><br /><br />
New Password :&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="newpassword" id="newpassword" size="39"><br /><br />
Repeat Password  : <input type="text" name="newpassword2" id="newpassword2" size="39"><br /><br />
<input type="submit" name="senddata" id="senddata" value="Update Information">
</form>
</div>
<hr />
<form action="profile.php" method="post">
<p>UPDATE YOUR PROFILE INFO:</p> <br />
First Name:&nbsp; <input type="text" name="fname" id="fname" size="40" value="<?php echo $db_firstname; ?>"><br /><br />
Last Name:&nbsp; <input type="text" name="lname" id="lname" size="40" value="<?php echo $db_last_name; ?>"><br /><br />
About You:&nbsp;&nbsp; <textarea name="bio" id="bio" rows="3" cols="42"><?php echo $db_bio; ?></textarea><br /><br />
<input type="submit" name="updateinfo" id="updateinfo" value="Update Information">
</form>
<hr />
<form action="close_account.php" method="post">
<p>CLOSE ACCOUNT:</p> <br />
<input type="submit" name="closeaccount" id="closeaccount" value="Close My Account">
</form>
<hr />
<br />
<br />
  </div>
</div> 
<?php include( "./inc/footer.inc.php" ); ?>    