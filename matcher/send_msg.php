<?php 
include( "./inc/connect.inc.php" );
session_start();
if(!isset($_SESSION["user_login"])) {
    $user="";
} else {
    $user = $_SESSION["user_login"];
} 
$get_unread_query = mysql_query("SELECT opened FROM pvt_messages WHERE user_to='$user' && opened='no' ");
$get_unread=mysql_fetch_assoc($get_unread_query);
$unread_numrows = mysql_num_rows($get_unread_query);
$unread_numrows="(".$unread_numrows.")";
//echo $unread_numrows;
?>
<?php
if ($user) {

}
else
{
 die ("You must be logged in to view this page!");
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
<?php
if (isset($_GET['u'])) {
	$username = mysql_real_escape_string($_GET['u']);
	if (ctype_alnum($username)) {
 	//check user exists
	$check = mysql_query("SELECT username FROM users WHERE username='$username'");
	if (mysql_num_rows($check)===1) {
	$get = mysql_fetch_assoc($check);
	$username = $get['username'];
	
	//Check user isn't sending themself a private message
	if ($username != $user) {
          if (isset($_POST['submit'])) {
            $msg_title = strip_tags(@$_POST['msg_title']);
            $msg_body = strip_tags(@$_POST['msg_body']);
            $date = date("Y-m-d");
            $opened = "no";
            $deleted = "no";
            
            if ($msg_title == "Enter the message title here ...") {
             echo "Please give your message a title.";
            }
            else
            if (strlen($msg_title) < 3) {
             echo "Your message title cannot be less than 3 characters in length!";
            }
            else
            if ($msg_body == "Enter the message you wish to send ...") {
             echo "Please write a message.";
            }
            else
            if (strlen($msg_body) < 3) {
             echo "Your message cannot be less than 3 characters in length!";
            }
            else
            {

            $send_msg = mysql_query("INSERT INTO pvt_messages VALUES ('','$user','$username','$msg_title','$msg_body','$date','$opened','$deleted')");
           echo "Your message has been sent!";
            }
          }
        echo "
        
        <form action='send_msg.php?u=$username' method='POST'>
        <h2>Compose a Message: ($username)</h2>
        <input type='text' name='msg_title' size='30' onClick=\"value=''\" value='Enter the message title here ...'><p />
        <textarea cols='50' rows='12' name='msg_body'>Enter the message you wish to send ...</textarea><p />
        <input type='submit' name='submit' value='Send Message'>
        </form>

        ";
        }
        else
        {
         header("Location: $user");
        }
	}
	}
}
?>
<?php include( "./inc/footer.inc.php" ); ?>