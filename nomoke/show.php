<?php
ini_set('display_error',1);
error_reporting(E_ALL ^ E_DEPRECATED);
//$conn = mysql_connect('localhost','root','');
//if(!$conn)
//{
//echo mysql_error();
//}
//$db=mysql_select_db("imagestore",$conn);
//if(!$db)
//{
//echo mysql_error();
//}
//SELECT * FROM `animaldata` WHERE 1

//$q = "SELECT * FROM animaldata ORDER BY 'ano'";
//$r = mysql_query($q,$conn);
//if($r)
//{
//while($row=mysql_fetch_array($r))
//{
	//header("content-type: text/plain");
	//echo "\n";
	//echo $row['aname'];
	//echo "\n";
	//echo $row['adetails'];
	//echo "\n";
//	$type = "Content-type: ".$row['aphototype'];
//	header ($type);
//	echo '<img height="300" width="300" src="data:aphoto;base64,'.$row['aphoto'].'">';
	//echo $row['aphoto'];
	//echo "<img src='image.php?ano='.$row['ano'].'/>";
//}
//}  
//else
//{
//echo mysql_error();	
//}
//{
//	$con = mysql_connect("localhost","root","");
  //        	mysql_select_db("kstark",$con);
    //      	$qry = "select * from images";
      //    	$result = mysql_query($qry,$con);
        //  	while($row = mysql_fetch_array($result))
          //	{
          	//	echo '<img height="300" width="300" src="data:image;base64,'.$row[2].'">';
          	//}
          	//mysql_close($con);
//}
$link = mysql_connect("localhost","root","");
mysql_select_db("imagestore");
$sql = "SELECT aphoto FROM animaldata ORDER BY 'ano'";
if($result = mysql_query($sql)) {  
while($row = mysql_fetch_assoc($result)){
	$type = "Content-type: ".$row['aphototype'];
	header ($type);
  echo '<img  height="200" width="200" src="data:aphoto;base64,'.$row['aphoto'].'" class="img-circle img-responsive center-block" alt="your 

  image" >';   
     
}
mysql_close($link);
}
 else {
          echo mysql_error();
          echo "could not connect to the server";
     }
?>