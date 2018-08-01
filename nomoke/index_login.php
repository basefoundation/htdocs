<?php
 require ('connect_database.php');

   ini_set('mysql.connect_timeout', 300);
   ini_set('default_socket_timeout', 300);
     
   //  $query = "SELECT username, password  FROM users ORDER BY 'id' ";
   //  if($query_run = mysql_query($query)) {
    // 	while ($query_row=mysql_fetch_assoc($query_run)) {
    // 	 $food = $query_row['username'];
    // 		$calories = $query_row['password'];
     		//echo $food.' has '.$calories.' calories.<br>';
     //		echo $calories;
     	//}
     //}
   //  else {
     //	echo mysql_error();
    // 	echo "could not connect to the server";
    // }
//     $query = " SELECT 'food' , 'calories' FROM food ORDER BY 'id' ";
  //   $query_run = mysql_query($query);
    // if ($query_run = mysql_query($query)) {
     //	echo "Query success";
     //} else {
     	//echo mysql_error();
     //}
   //$sql = "SELECT image FROM images WHERE id=1";

 ?>
<?php require('header.php') ?>

		<div class="container" style="margin-top:130px">
		<div class="row">
<h1 class="text-center">Fill In The Blanks</h1>
<div class="col-md-4 col-md-offset-4">
<div class="form-group has-danger">
<h4 class="text-center">S <input type="text" style="width: 20px; height: 20px" /> <input type="text" style="width: 20px; height: 20px" /> P C <input type="text" style="width: 20px; height: 20px" /> <input type="text" style="width: 20px; height: 20px" /> T</h4>
		<!--<input class="form-control" type="text" id="inputName" placeholder=""></input> -->
		</div>
		<div class="col-md-24 col-md-offset-0"><div class="form-group has-danger">
			<a href="matchnow_sql.php"><button class="btn btn-success btn-block" title="LOG IN for match now!" disabled>Match Now</button></a>
	</input>
		</div>
		</div>
</div>
</div>
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
<button class="btn btn-primary btn-block " title="LOG IN for add to favourite" disabled>Favourite
</button>
<button class="btn btn-success btn-block" title="LOG IN for add to chat" disabled>Chat
</button>
</section>
<section class="col-sm-4">
<h2 class="text-center">Shweta Singh</h2>
<img  height="200" width="200" src="img/c.jpg" class="img-circle center-block" alt="your image" title="LOG IN for chat and Many more" >
<h3 class="text-center">Hi Shweta here</h3>
<button class="btn btn-primary btn-block " title="LOG IN for add to favourite" disabled>Favourite
</button>
<button class="btn btn-success btn-block" title="LOG IN for add to chat" disabled>Chat
</button>
</section>
<section class="col-sm-4">
<h2 class="text-center">Neha Kumari</h2>
<img  height="200" width="200" src="img/d.jpg" class="img-circle center-block" alt="your image" title="LOG IN for chat and Many more" >
<h3 class="text-center">Hi Neha here</h3>
<button class="btn btn-primary btn-block " title="LOG IN for add to favourite" disabled>Favourite
</button>
<button class="btn btn-success btn-block" title="LOG IN for add to chat" disabled>Chat
</button>
</section>
<section class="col-sm-4">
<h2 class="text-center">Sapna Pandey</h2>
<img  height="200" width="200" src="img/e.jpg" class="img-circle center-block" alt="your image" title="LOG IN for chat and Many more" >
<h3 class="text-center">Hi sapna here</h3>
<button class="btn btn-primary btn-block " title="LOG IN for add to favourite" disabled>Favourite
</button>
<button class="btn btn-success btn-block" title="LOG IN for add to chat" disabled>Chat
</button>
</section>
<section class="col-sm-4">
<h2 class="text-center">Pooja Singh </h2>
<img  height="200" width="200" src="img/i.jpg" class="img-circle center-block" alt="your image" title="LOG IN for chat and Many more" >
<h3 class="text-center">Hi Alisha here</h3>
<button class="btn btn-primary btn-block " title="LOG IN for add to favourite" disabled>Favourite
</button>
<button class="btn btn-success btn-block" title="LOG IN for add to chat" disabled>Chat
</button>
</section>
<section class="col-sm-4">
<h2 class="text-center">Komal Sah</h2>
<img  height="200" width="200" src="img/k.jpg" class="img-circle center-block" alt="your image" title="LOG IN for chat and Many more" >
<h3 class="text-center">Hi Komal here</h3>
<button class="btn btn-primary btn-block " title="LOG IN for add to favourite" disabled>Favourite
</button>
<button class="btn btn-success btn-block" title="LOG IN for add to chat" disabled>Chat
</button>
</section>
</div>
</div>
		<?php include('footer.php') ?>