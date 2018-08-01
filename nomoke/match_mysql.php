 <?php
//$link = mysql_connect("localhost","root","");
//mysql_select_db("match");
//$first = "SELECT first  FROM match_sql WHERE id=1";
//$last = "SELECT last  FROM match_sql WHERE id=1";
//$image = "SELECT image  FROM match_sql WHERE id=1";
//$status = "SELECT status  FROM match_sql WHERE id=1";
//$query_first = mysql_query($first);
//$query_last = mysql_query($last);
//$result = mysql_query($image);
//$row_first = mysql_fetch_assoc($query_first);
//$row = mysql_fetch_assoc($result);
//mysql_close($link);
 //  $query = "SELECT username, password  FROM users ORDER BY 'id' ";
   //  if($query_run = mysql_query($query)) {
    //    while ($query_row=mysql_fetch_assoc($query_run)) {
    //     $food = $query_row['username'];
    //         $calories = $query_row['password'];
               //echo $food.' has '.$calories.' calories.<br>';
     //        echo $calories;
          //}
     //}
   //  else {
     //   echo mysql_error();
    //    echo "could not connect to the server";
    // }
 /*
 $link = mysql_connect("localhost","root","");
mysql_select_db("kstark");
 $query = "SELECT first, last , status FROM match_sql ORDER BY 'sn' ";
     if($query_run = mysql_query($query)) {
     	while($query_row=mysql_fetch_assoc($query_run)) { 
     	     	 $first = $query_row['first'];
     		$last = $query_row['last'];
     		$status = $query_row['status'];
               echo '<h2 class="text-center">'.$first . ' ' . $last.'</h2>';
     }
}
     else {
     	echo mysql_error();
     	echo "could not connect to the server";
     }
*.
//$link = mysql_connect("localhost","root","");
//mysql_select_db("kstark");
//$sql = "SELECT image FROM images ORDER BY 'id'";
//if($result = mysql_query($sql)) {  
//while($row = mysql_fetch_assoc($result)){
//echo '<img  height="200" width="200" src="data:image;base64,'.$row['image'].'" class="img-circle img-responsive center-block" alt="your 

  //image" >';      
//}
//mysql_close($link);
//} else {
  //    echo mysql_error();
    //      echo "could not connect to the server";
     //}
     /*
$link = mysql_connect("localhost","root","");
mysql_select_db("match");
mysql_select_db("kstark");
$query = "SELECT first, last , status FROM match_mysql ORDER BY 'sn' "; 
$link = mysql_connect("localhost","root","");
mysql_select_db("kstark");
$sql = "SELECT image FROM images ORDER BY 'id'";
echo '<div class="container">
<div class="row">';
   if($query_run = mysql_query($query)) {
if ($result = mysql_query($sql)) {
        
while($row = mysql_fetch_assoc($result)) &&  while($query_row=mysql_fetch_assoc($query_run)){
   $first = $query_row['first'];
             $last = $query_row['last'];
             $status = $query_row['status'];
  echo '
  <section class="col-sm-4">
  <img  height="200" width="200" src="data:image;base64,'.$row['image'].'" class="img-circle img-responsive center-block" alt="your 

  image" >
  <h2 class="text-center">'.$first . ' ' . $last.'</h2>
<h3 class="text-center">'.$status.'</h3>
<button class="btn btn-primary btn-block ">Favourite
</button>
<button class="btn btn-success btn-block">Chat
</button>
  </section>';   
     
}
}
*/
  //      while($query_row=mysql_fetch_assoc($query_run)) { 
    //               $first = $query_row['first'];
      //       $last = $query_row['last'];
        //     $status = $query_row['status'];
//echo '
//<section class="col-sm-4">
//<h2 class="text-center">'.$first . ' ' . $last.'</h2>
//<h3 class="text-center">'.$status.'</h3>
//<button class="btn btn-primary btn-block ">Favourite
//</button>
//<button class="btn btn-success btn-block">Chat
//</button>
//</section>';
  
//}
/*
echo '</div>
</div> ';
}
else {
          echo mysql_error();
          echo "could not connect to the server";
     }

$link = mysql_connect("localhost","root","");
mysql_select_db("kstark");
$sql = "SELECT image FROM images ORDER BY 'id'";
if($result = mysql_query($sql)) {  
while($row = mysql_fetch_assoc($result)){
  echo '<img  height="200" width="200" src="data:image;base64,'.$row['image'].'" class="img-circle img-responsive center-block" alt="your 

  image" >';   
     
}
mysql_close($link);
}
 else {
          echo mysql_error();
          echo "could not connect to the server";
     }
     */
$query = "SELECT first, last , status FROM match_mysql ORDER BY 'sn' ";
$sql = "SELECT image FROM images ORDER BY 'id'";
if($query_run = mysql_query($query) && $result = mysql_query($sql)) {
while($query_row=mysql_fetch_array($query_run) || $row=mysql_fetch_array($result) ) {
   $first = $query_row['first'];
             $last = $query_row['last'];
             $status = $query_row['status'];
  echo '
<div class="container">
<div class="row">
<section class="col-sm-4">
<h2 class="text-center">'.$first . ' ' . $last.'</h2>
<img  height="200" width="200" src="data:image;base64,'.$row['image'].'" class="img-circle img-responsive center-block" alt="your image" >
<h3 class="text-center">'.$status.'</h3>
<button class="btn btn-primary btn-block ">Favourite
</button>
<button class="btn btn-success btn-block">Chat
</button>
</section>
</div>
</div>';  
 echo '
<div class="container">
<div class="row">
<section class="col-sm-4">
<h2 class="text-center">komal Sah</h2>
<img  height="200" width="200" src="img/k.jpg" class="img-circle img-responsive center-block" alt="your image" >
<h3 class="text-center">Hi komal here</h3>
<button class="btn btn-primary btn-block ">Favourite
</button>
<button class="btn btn-success btn-block">Chat
</button>
</section>
</div>
</div>'; 
}
}
else {
          echo mysql_error();
          echo "could not connect to the server";
     }
//mysql_close($link);
//mysql_close($link);
//echo '
//<div class="container">
//<div class="row">
//<section class="col-sm-4">
//<h2 class="text-center">'.$first . ' ' . $last.'</h2>
//<img  height="200" width="200" src="data:image;base64,'.$row['image'].'" class="img-circle img-responsive center-block" alt="your image" >//
//<h3 class="text-center">'.$status.'</h3>
//<button class="btn btn-primary btn-block ">Favourite
//</button>
//<button class="btn btn-success btn-block">Chat
//</button>
//</section>
//</div>
//</div>';
?>