<?php include ( "./inc/header.inc.php" );
?>
<?php
if(isset($_GET['u'])) {
	$user=mysql_real_escape_string($_GET['u']);
	if(ctype_alnum($user)) {
		//check user exists
		$check=mysql_query("SELECT username,first_name FROM users WHERE username='$user'");
		if (mysql_num_rows($check)==1) {
			$get=mysql_fetch_assoc($check);
			$user=$get['username'];
			$firstname=$get['first_name'];
		}
		else
		{
			echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost/tutorial/findfriends/index.php\">";
			exit();
		}
	}
}
  $post =@$_POST['post'];
if($post != "") {
	$date_added = date("Y-m-d");
	$added_by = $username;  
	$user_posted_to=$user;
	$sqlCommand="INSERT INTO posts VALUES('','$post','$date_added','$added_by','$user_posted_to')";
	$query=mysql_query($sqlCommand) or die (mysql_error());
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
?>
<div id="status"></div>
<div class="postForm" method="POST">
<form action="<?php echo $user; ?>" method="POST">
	<textarea id="post" name="post" rows="4" cols="58"></textarea>
	<input type="submit" name="send" value="Post" style="background-color: #DCE5EE; float: right; border: 1px solid #666; color: #666; height: 73px; width: 65px; "/>
	</form>
</div>
<div class="profilePosts">
	<?php
	$getposts = mysql_query("SELECT * FROM posts WHERE user_posted_to='$user' ORDER BY id DESC LIMIT 10") or die(mysql_error());
	while ($row=mysql_fetch_assoc($getposts))  {
		$id=$row['id'];
		$body=$row['body'];
		$date_added=$row["date_added"];
		$added_by=$row['added_by'];
		$user_posted_to=$row['user_posted_to'];
		 $get_user_info = mysql_query("SELECT * FROM users WHERE username='$added_by'");
                                                $get_info = mysql_fetch_assoc($get_user_info);
                                                $profilepic_info = $get_info['profile_pic'];
                                                if ($profilepic_info == "") {
                                                 $profilepic_info = "./img/default_pic.jpg";
                                                }
                                                else
                                                {
                                                 $profilepic_info = "./userdata/profile_pics/".$profilepic_info;
                                                }


						echo "
                                                <div style='float: left;'>
                                                <img src='$profilepic_info' height='60'>
                                                </div>
						<div class='posted_by'>
						Posted by:
                                                <a href='$added_by'>$added_by</a> on $date_added</div>
                                                <br /><br />
                                                <div  style='max-width: 600px;'>
                                                $body<br /><p /><p />
                                                </div>
                                                <hr />
						";
}

if (isset($_POST['sendmsg'])) {
 header("Location: send_msg.php?u=$user"); 
}

$errorMsg = "";
  if (isset($_POST['addfriend'])) {
     $friend_request = $_POST['addfriend'];
     
     $user_to = $username;
     $user_from = $user;
     
     if ($user_to == $user) {
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
	//	echo "
//<div class='posted_by'><a href='$added_by'>$added_by</a> - $date_added - </div> &nbsp;&nbsp;$body<br /><hr />
//		";
//	}

	?>

</div>
<img src="<?php echo $profile_pic;   ?>" height="250" width="200" alt="<?php echo $user;?>'s Profile" title="<?php echo $user;?>'s Profile"/>
<br />
<form action="<?php echo $user; ?>" method="POST">
<?php
$friendsArray = "";
$countFriends = "";
$friendsArray12 = "";
$addAsFriend = "";
$selectFriendsQuery = mysql_query("SELECT friend_array FROM users WHERE username='$user'");
$friendRow = mysql_fetch_assoc($selectFriendsQuery);
$friendArray = $friendRow['friend_array'];
if ($friendArray != "") {
   $friendArray = explode(",",$friendArray);
   $countFriends = count($friendArray);
   $friendArray12 = array_slice($friendArray, 0, 12);

$i = 0;
if (in_array($username,$friendArray)) {
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
  $add_friend_check = mysql_query("SELECT friend_array FROM users WHERE username='$username'");
  $get_friend_row = mysql_fetch_assoc($add_friend_check);
  $friend_array = $get_friend_row['friend_array'];
  $friend_array_explode = explode(",",$friend_array);
  $friend_array_count = count($friend_array_explode);
  
  //Friend array for user who owns profile
  $add_friend_check_username = mysql_query("SELECT friend_array FROM users WHERE username='$user'");
  $get_friend_row_username = mysql_fetch_assoc($add_friend_check_username);
  $friend_array_username = $get_friend_row_username['friend_array'];
  $friend_array_explode_username = explode(",",$friend_array_username);
  $friend_array_count_username = count($friend_array_explode_username);
  
  $usernameComma = ",".$user;
  $usernameComma2 = $user.",";
  
  $userComma = ",".$username;
  $userComma2 = $username.",";
  
  if (strstr($friend_array,$usernameComma)) {
   $friend1 = str_replace("$usernameComma","",$friend_array);
  }
  else
  if (strstr($friend_array,$usernameComma2)) {
   $friend1 = str_replace("$usernameComma2","",$friend_array);
  }
  else
  if (strstr($friend_array,$user)) {
   $friend1 = str_replace("$user","",$friend_array);
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
  if (strstr($friend_array,$username)) {
   $friend2 = str_replace("$username","",$friend_array);
  }

  $friend2 = "";

  $removeFriendQuery = mysql_query("UPDATE users SET friend_array='$friend1' WHERE username='$username'");
  $removeFriendQuery_username = mysql_query("UPDATE users SET friend_array='$friend2' WHERE username='$user'");
  echo "Friend Removed ...";
  header("Location: $user");
}

//Poke code
if (@$_POST['poke']) {
  $check_if_poked = mysql_query("SELECT * FROM pokes WHERE user_to='$user' && user_from='$username'");
  $num_poke_found = mysql_num_rows($check_if_poked);
  if ($num_poke_found == 1) {
   echo "You must wait to be poked back.";
  }
  else
  if ($user == $username) {
   echo "You cannot Poke yourself.";
  }
  else
  {
 $poke_user = mysql_query("INSERT INTO pokes VALUES ('','$username','$user')");
 echo "$user has been poked.";
  }
}

//Create like button if it doesn't already exist
$check_like_button = mysql_query("SELECT * FROM like_buttons WHERE uid='$user'");
$check_like_numrows = mysql_num_rows($check_like_button);
if ($check_like_numrows >= 1) {
 //Do Nothing
}
else
{
  $date = date("Y-m-d");
  $create_button = mysql_query("INSERT INTO like_buttons VALUES ('', '$user', 'http://localhost/tutorials/findFriends/$user', '$date', '$user')");
  $insert_like = mysql_query("INSERT INTO likes VALUES('','$user','-1','$user')");
}
?>
<?php echo $errorMsg; ?>
<input type="submit" name="poke" value="Poke" />
<input type="submit" name="sendmsg" value="Send Msg" />
<iframe src='http://localhost/tutorial/findFriends/like_but_frame.php?uid=<?php echo $user; ?>' style='border: 0px;height: 23px; width: 110px;'> </iframe>
</form>
<div class="textHeader"><?php echo $user; ?>'s Profile</div>
<div class="profileLeftSideContent">
<?php
  $about_query = mysql_query("SELECT bio FROM users WHERE username='$user'");
  $get_result = mysql_fetch_assoc($about_query);
  $about_the_user = $get_result['bio'];

  echo $about_the_user;
?>
</div>
<div class="textHeader"><?php echo $user; ?>'s Friends</div>
<div class="profileLeftSideContent">
<?php
if ($countFriends != 0) {
foreach ($friendArray12 as $key => $value) {
 $i++;
 $getFriendQuery = mysql_query("SELECT * FROM users WHERE username='$value' LIMIT 1");
 $getFriendRow = mysql_fetch_assoc($getFriendQuery);
 $friendUsername = $getFriendRow['username'];
 $friendProfilePic = $getFriendRow['profile_pic'];

 if ($friendProfilePic == "") {
  echo "<a href='$friendUsername'><img src='img/default_pic.jpg' alt=\"$friendUsername's Profile\" title=\"$friendUsername's Profile\" height='50' width='40' style='padding-right: 6px;'></a>";
 }
 else
 {
  echo "<a href='$friendUsername'><img src='userdata/profile_pics/$friendProfilePic' alt=\"$friendUsername's Profile\" title=\"$friendUsername's Profile\" height='50' width='40' style='padding-right: 6px;'></a>";
 }
}
}
else
echo $user." has no friends yet.";
?>
</div>
<div class="textHeader"><?php echo $user; ?>'s Albums</div>
<div class="profileLeftSideContent">
<input type="submit" name="View Albums" value="View Albums" />
</div>