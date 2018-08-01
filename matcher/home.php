<?php 
include( "./inc/connect.inc.php" );
session_start();
if(!isset($_SESSION["user_login"])) {
	$user="";
} else {
	$user = $_SESSION["user_login"];
} 
?>
<?php
if (isset($_GET['u'])) {
  $username = mysql_real_escape_string($_GET['u']);
  if (ctype_alnum($username)) {
  //check user exists
  $check = mysql_query("SELECT username, first_name FROM users WHERE username='$username'");
  if (mysql_num_rows($check)===1) {
  $get = mysql_fetch_assoc($check);
  $username = $get['username'];
  $firstname = $get['first_name'];  
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
     <!-- <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      -->
    </ul>
</div>


      </div>
    </div>
      
    </nav>
    <div class="container" style="margin-top:130px">
    <div class="row">
             <h1 class="text-center">Choose a random number between<br /> 1-10</h1>
               <div class="col-md-4 col-md-offset-4">
                     <div class="form-group has-danger">
                     <form action="home.php" method="POST">
                        <input type="text" name="data" style="width: 360px; height: 30px" />
    <!--<input class="form-control" type="text" id="inputName" placeholder=""></input> -->
                </div>
                       <div class="col-md-24 col-md-offset-0">
                                  <div class="form-group has-danger">
                                        <input class="btn btn-success btn-block" title="LOG IN for match now!" type="submit" name="reg"></input>
                                  </div>
                       </div>
                       </form>
                </div>
       </div>
</div>
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
 //   echo $reg;
   // echo $fn;
   // echo $user;
    $qury = mysql_query("INSERT INTO `match` VALUES ('','$user','$fn')");
    $result = mysql_query("SELECT name,data FROM `match` WHERE data=1");
        $storeArray = Array();
         echo "<div class='container'>
      <div class='row'>";
        while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
      // $storeArray[] = (string) $row['name']; 
        $get_info = mysql_query("SELECT first_name, last_name, bio FROM users WHERE email='".$row['name']."' ");
  $get_row = mysql_fetch_assoc($get_info);
  $db_firstname = $get_row['first_name'];
  $db_last_name = $get_row['last_name'];
  $db_bio = $get_row['bio'];
      echo "<section class='col-sm-4'>
                        <h2 class='text-center'>";
                        //echo $row['name'];
                        echo "$db_firstname ";
                        echo $db_last_name;
                        echo "</h2>;
                               <img  height='200' width='200' src='img/default_pic.jpg' class='img-circle center-block' alt='your image' title='LOG IN for chat and Many more' />
                        <h3 class='text-center'>$db_bio</h3>
                               <button class='btn btn-success btn-block' title='LOG IN for add to chat'>match now!
                               </button></section>";
}
echo "</div></div> <div class='container'>
  <div class='row'>
  <h4 class='text-center'>
  &copy;All copy rights are revised by nomake.in 2017
  </h4>
  </div>
  </div>
  </div>
</div>";
    die(mysql_error());
}
}
} 
?>
<div class="container">
      <div class="row">
           <h1>20000+ online now</h1>
    
   </div>
</div>
<div class="container">
      <div class="row">
             <section class="col-sm-4">
                        <h2 class="text-center">Alisha Singal</h2>
                               <img  height="200" width="200" src="img/a.jpg" class="img-circle center-block" alt="your image" title="LOG IN for chat and Many more" >
                        <h3 class="text-center">Hi Alisha here</h3>
                               <button class="btn btn-success btn-block" title="LOG IN for add to chat">match now!
                               </button>
            </section>
             <section class="col-sm-4">
                         <h2 class="text-center">Shweta Singh</h2>
                                <img  height="200" width="200" src="img/c.jpg" class="img-circle center-block" alt="your image" title="LOG IN for chat and Many more" >
                         <h3 class="text-center">Hi Shweta here</h3>
                                 <button class="btn btn-success btn-block" title="LOG IN for add to chat" >match now!
                                 </button>
             </section>
             <section class="col-sm-4">
                          <h2 class="text-center">Neha Kumari</h2>
                               <img  height="200" width="200" src="img/d.jpg" class="img-circle center-block" alt="your image" title="LOG IN for chat and Many more" >
                          <h3 class="text-center">Hi Neha here</h3>
                                   <button class="btn btn-success btn-block" title="LOG IN for add to chat">
                                     match now!
                                   </button>
             </section>
             <section class="col-sm-4">
                        <h2 class="text-center">Sapna Pandey</h2>
                               <img  height="200" width="200" src="img/e.jpg" class="img-circle center-block" alt="your image" title="LOG IN for chat and Many more" >
                        <h3 class="text-center">Hi sapna here</h3>
                                  <button class="btn btn-success btn-block " title="LOG IN for add to favourite">match now!
                                  </button>
             </section>
             <section class="col-sm-4">
                        <h2 class="text-center">Pooja Singh </h2>
                                <img  height="200" width="200" src="img/i.jpg" class="img-circle center-block" alt="your image" title="LOG IN for chat and Many more" >
                                <h3 class="text-center">Hi Alisha here</h3>
                                <button class="btn btn-success btn-block" title="LOG IN for add to chat" >match now!
                                </button>
             </section>
             <section class="col-sm-4">
                          <h2 class="text-center">Komal Sah</h2>
                                 <img  height="200" width="200" src="img/k.jpg" class="img-circle center-block" alt="your image" title="LOG IN for chat and Many more" >
                          <h3 class="text-center">Hi Komal here</h3>
                           <button class="btn btn-success btn-block" title="LOG IN for add to chat" >match now!
             </section>
      </div>
</div>
    <?php include( "./inc/footer.inc.php" ); ?>