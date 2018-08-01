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
<nav class="navbar navbar-default ">
		<div class="container">
		      <div class="row">
			       <div class="col-sm-8">
				         <ul class="nav nav-tabs">
			                   <li role="presentation" ><a href="index.php"><img src="img/nomoke.jpg" title="" style="height: 40px; width: 40px"></a></li>
                               <li><h4 style="color: green" />No Fakes!</h4><h4 style="color: green"> The Real Social Network</h4></li>
			             </ul>
			      </div>
			      <div class="col-sm-4" >
	                  <ul class="nav navbar-nav navbar-right"> 
	                         <form class="navbar-form navbar-left">
                                    <div class="input-group">
                                          <button class="btn btn-danger" type="submit"><a href="login.php">Sign up</a> 
                                          </button>&nbsp;&nbsp;
                                          <button class="btn btn-success" type="submit" ><a href="login.php"> Log in</a>
                                          </button>
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