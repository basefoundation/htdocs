<?php 
include( "./inc/connect.inc.php" );
session_start();
if(!isset($_SESSION["user_login"])) {
  $user="";
} else {
  $parts = explode("@", $_SESSION["user_login"]);
  $user = $parts[0];
} 
$get_unread_query = mysql_query("SELECT opened FROM pvt_messages WHERE user_to='$user' && opened='no' ");
$get_unread=mysql_fetch_assoc($get_unread_query);
$unread_numrows = mysql_num_rows($get_unread_query);
$unread_numrows="(".$unread_numrows.")";
//echo $unread_numrows;
?>
<?php
if (isset($_GET['u'])) {
  $username = mysql_real_escape_string($_GET['u']);
  if (ctype_alnum($username)) {
  //check user exists
  $check = mysql_query("SELECT username, first_name FROM users WHERE username='$username'");
  if (mysql_num_rows($check)===1) {
  $get = mysql_fetch_assoc($check);
 // $parts = explode("@", $get['email']);
 // $username = $parts[0];
  $username = $get['username'];
  $firstname = $get['first_name'];
 // echo $$username;  
  }
  else
  {
  echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost/matcher/index.php\">"; 
  exit();
  }
  }
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
            <li role="presentation" ><a href="profile.php">Me</a></li></ul>
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
if (isset($_POST['sendmsg'])) {
 header("Location: send_msg.php?u=$username"); 
}

$errorMsg = "";
  if (isset($_POST['addfriend'])) {
     $friend_request = $_POST['addfriend'];
     
     $user_to = $user;
     $user_from = $username;
     
     if ($user_to == $username) {
      $errorMsg = "You can't send a friend request to yourself!<br />";
     }
     else
     {
      $create_request = mysql_query("INSERT INTO friend_requests VALUES ('','$user_to','$user_from')");
      $errorMsg = "Your friend Request has been sent!";
     }

  }
  else
  {
   //Do nothing
  }

    
?>
<?php
  $senddata = @$_POST['senddata'];

  //Password variables
  $old_password = strip_tags(@$_POST['oldpassword']);
  $new_password = strip_tags(@$_POST['newpassword']);
  $repeat_password = strip_tags(@$_POST['newpassword2']);

  if ($senddata) {
  //If the form has been submitted ...

  $password_query = mysql_query("SELECT * FROM users WHERE username='$user'");
  while ($row = mysql_fetch_assoc($password_query)) {
        $db_password = $row['password'];
        
        //md5 the old password before we check if it matches
        $old_password_md5 = md5($old_password);
        
        //Check whether old password equals $db_password
        if ($old_password_md5 == $db_password) {
         //Continue Changing the users password ...
         //Check whether the 2 new passwords match
         if ($new_password == $repeat_password) {
            if (strlen($new_password) <= 4) {
             echo "<h3 class='text-center'>Sorry! But your password must be more than 4 character long!</h3>";
            }
            else
            {

            //md5 the new password before we add it to the database
            $new_password_md5 = md5($new_password);
           //Great! Update the users passwords!
           $password_update_query = mysql_query("UPDATE users SET password='$new_password_md5' WHERE username='$user'");
           echo "<h3 class='text-center'>Success! Your password has been updated!</h3>";

            }
         }
         else
         {
          echo "<h3 class='text-center'>Your two new passwords don't match!</h3>";
         }
        }
        else
        {
         echo "<h3 class='text-center'>The old password is incorrect!</h3>";
        }
  }
   }
  else
  {
   echo "";
  }
   $updateinfo = @$_POST['updateinfo'];

  //First Name, Last Name and About the user query
  $get_info = mysql_query("SELECT first_name, last_name, bio FROM users WHERE username='$user'");
  $get_row = mysql_fetch_assoc($get_info);
  $db_firstname = $get_row['first_name'];
  $db_last_name = $get_row['last_name'];
  $db_bio = $get_row['bio'];

  //Submit what the user types into the database
  if ($updateinfo) {
   $firstname = strip_tags(@$_POST['fname']);
   $lastname = strip_tags(@$_POST['lname']);
   $bio = @$_POST['bio'];


   if (strlen($firstname) < 3) {
    echo "<h3 class='text-center'>Your first name must be 3 more more characters long.</h3>";
   }
   else
   if (strlen($lastname) < 5) {
    echo "<h3 class='text-center'>Your last name must be 5 more more characters long.</h3>";
   }
   else
   {
    //Submit the form to the database
    $info_submit_query = mysql_query("UPDATE users SET first_name='$firstname', last_name='$lastname', bio='$bio' WHERE username='$user'");
    echo "<h3 class='text-center'>Your profile info has been updated!</h3>";
    header("Location: profile.php");
   }
  }
  else
  {
   //Do nothing
  }
   //Check whether the user has uploaded a profile pic or not
  $check_pic = mysql_query("SELECT profile_pic FROM users WHERE username='$user'");
  $get_pic_row = mysql_fetch_assoc($check_pic);
  $profile_pic_db = $get_pic_row['profile_pic'];
  if ($profile_pic_db == "") {
  $profile_pic = "img/default_pic.jpg";
  }
  else
  {
  $profile_pic = "userdata/profile_pics/".$profile_pic_db;
  }
  //Profile Image upload script
  if (isset($_FILES['profilepic'])) {
   if (((@$_FILES["profilepic"]["type"]=="image/jpeg") || (@$_FILES["profilepic"]["type"]=="image/png") || (@$_FILES["profilepic"]["type"]=="image/gif"))&&(@$_FILES["profilepic"]["size"] < 1048576)) //1 Megabyte
  {
   $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
   $rand_dir_name = substr(str_shuffle($chars), 0, 15);
   mkdir("userdata/profile_pics/$rand_dir_name");
 
   if (file_exists("userdata/profile_pics/$rand_dir_name/".@$_FILES["profilepic"]["name"]))
   {
    echo @$_FILES["profilepic"]["name"]." Already exists";
   }
   else
   {
    move_uploaded_file(@$_FILES["profilepic"]["tmp_name"],"userdata/profile_pics/$rand_dir_name/".$_FILES["profilepic"]["name"]);
    //echo "Uploaded and stored in: userdata/profile_pics/$rand_dir_name/".@$_FILES["profilepic"]["name"];
    $profile_pic_name = @$_FILES["profilepic"]["name"];
    $profile_pic_query = mysql_query("UPDATE users SET profile_pic='$rand_dir_name/$profile_pic_name' WHERE username='$user'");
    header("Location: profile.php");
    
   }
  }
  else
  {
      echo "<h3 class='text-center'>Invailid File! Your image must be no larger than 1MB and it must be either a .jpg, .jpeg, .png or .gif</h3>";
  } 
  }

?>
<div class="container" style="">
<div class="row">
<img  height="100" width="100" src="<?php echo $profile_pic; ?>" class="img-circle img-responsive" alt="your image" class="pull-left" >
<a href="logout.php"><button class="pull-right" style="color: green">
  Logout
</button></a><br />
<?php
if (isset($_POST['sendmsg'])) {
 header("Location: send_msg.php?u=$username"); 
}

$errorMsg = "";
  if (isset($_POST['addfriend'])) {
     $friend_request = $_POST['addfriend'];
     
     $user_to = $user;
     $user_from = $username;
     
     if ($user_to == $username) {
      $errorMsg = "You can't send a friend request to yourself!<br />";
     }
     else
     {
      $create_request = mysql_query("INSERT INTO friend_requests VALUES ('','$user_to','$user_from')");
      $errorMsg = "Your friend Request has been sent!";
     }

  }
  else
  {
   //Do nothing
  }

    


  ?>
</div>
<form action="<?php echo $username; ?>" method="POST">
<?php
$friendsArray = "";
$countFriends = "";
$friendsArray12 = "";
$addAsFriend = "";
$selectFriendsQuery = mysql_query("SELECT friend_array FROM users WHERE username='$username'");
$friendRow = mysql_fetch_assoc($selectFriendsQuery);
$friendArray = $friendRow['friend_array'];
if ($friendArray != "") {
   $friendArray = explode(",",$friendArray);
   $countFriends = count($friendArray);
   $friendArray12 = array_slice($friendArray, 0, 12);

$i = 0;
if (in_array($user,$friendArray)) {
 $addAsFriend = '<input type="submit" name="removefriend" value="UnFriend">';
}
else
{
 $addAsFriend = '<input type="submit" name="addfriend" value="Add Friend">';
}
echo $addAsFriend;
}
else
{
 $addAsFriend = '<input type="submit" name="addfriend" value="Add Friend">';
 echo $addAsFriend;
}
//$user = logged in user
//$username = user who owns profile
if (@$_POST['removefriend']) {
  //Friend array for logged in user
  $add_friend_check = mysql_query("SELECT friend_array FROM users WHERE username='$user'");
  $get_friend_row = mysql_fetch_assoc($add_friend_check);
  $friend_array = $get_friend_row['friend_array'];
  $friend_array_explode = explode(",",$friend_array);
  $friend_array_count = count($friend_array_explode);
  
  //Friend array for user who owns profile
  $add_friend_check_username = mysql_query("SELECT friend_array FROM users WHERE username='$username'");
  $get_friend_row_username = mysql_fetch_assoc($add_friend_check_username);
  $friend_array_username = $get_friend_row_username['friend_array'];
  $friend_array_explode_username = explode(",",$friend_array_username);
  $friend_array_count_username = count($friend_array_explode_username);
  
  $usernameComma = ",".$username;
  $usernameComma2 = $username.",";
  
  $userComma = ",".$user;
  $userComma2 = $user.",";
  
  if (strstr($friend_array,$usernameComma)) {
   $friend1 = str_replace("$usernameComma","",$friend_array);
  }
  else
  if (strstr($friend_array,$usernameComma2)) {
   $friend1 = str_replace("$usernameComma2","",$friend_array);
  }
  else
  if (strstr($friend_array,$username)) {
   $friend1 = str_replace("$username","",$friend_array);
  }
  //Remove logged in user from other persons array
  if (strstr($friend_array,$userComma)) {
   $friend2 = str_replace("$userComma","",$friend_array);
  }
  else
  if (strstr($friend_array,$userComma2)) {
   $friend2 = str_replace("$userComma2","",$friend_array);
  }
  else
  if (strstr($friend_array,$user)) {
   $friend2 = str_replace("$user","",$friend_array);
  }

  $friend2 = "";

  $removeFriendQuery = mysql_query("UPDATE users SET friend_array='$friend1' WHERE username='$user'");
  $removeFriendQuery_username = mysql_query("UPDATE users SET friend_array='$friend2' WHERE username='$username'");
  echo "Friend Removed ...";
  header("Location: $username");
}
?>
<input type="submit" name="sendmsg" value="Send Msg" />
</form>
<h2 class=" "><?php echo $db_firstname; ?> <?php echo $db_last_name; ?> </h2>
  <!--<h3 class="pull-left">Gender:Male </h3>-->
  <!--<h3 class="pull-right">Age:21 years </h3>-->
  <h3 class="text-center">status: <?php echo $db_bio; ?></h3>
</div>
<div >
</div>
</div>
</div>
<hr/>
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