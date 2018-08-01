<?php
/*
MySQL PHP Search Exercises by Adam Khoury @ developphp.com
MySQL Database Version Used In the Lessons: 5.1.58
PHP Version Used in the Lessons: 5.2.17
For Code Logic and Code Explanations Watch the Videos
*/
// Using MATCH AGAINST over multiple tables to perform search
error_reporting(E_ALL);
ini_set('display_errors', '1');
$search_output = "";
if(isset($_POST['searchquery']) && $_POST['searchquery'] != ""){
	$searchquery = preg_replace('#[^a-z 0-9?!]#i', '', $_POST['searchquery']);
	if($_POST['filter1'] == "Whole Site"){
		$sqlCommand = "(SELECT id, page_title AS title FROM pages WHERE MATCH (page_title,page_body) AGAINST ('$searchquery')) UNION (SELECT id, blog_title AS title FROM blog WHERE MATCH (blog_title,blog_body) AGAINST ('$searchquery'))";
	} else if($_POST['filter1'] == "Pages"){
		$sqlCommand = "SELECT id, page_title AS title FROM pages WHERE MATCH (page_title,page_body) AGAINST ('$searchquery')";
	} else if($_POST['filter1'] == "Blog"){
		$sqlCommand = "SELECT id, blog_title AS title FROM blog WHERE MATCH (blog_title,blog_body) AGAINST ('$searchquery')";

	}
    include_once("connect.php");
    $query = mysql_query($sqlCommand) or die(mysql_error());
	$count = mysql_num_rows($query);
	if($count > 1){
		$search_output .= "<hr />$count results for <strong>$searchquery</strong><hr />$sqlCommand<hr />";
		while($row = mysql_fetch_array($query)){
	            $id = $row["id"];
		    $title = $row["title"];
		    $search_output .= "Item ID: $id - $title<br />";
        } // close while
	} else {
		$search_output = "<hr />0 results for <strong>$searchquery</strong><hr />$sqlCommand";
	}
}
?>
<html>
<head>
</head>
<body>
<h2>Search the Exercise Tables</h2>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
Search For: 
<input name="searchquery" type="text" size="44" maxlength="88"> 
Within: 
<select name="filter1">
<option value="Whole Site">Whole Site</option>
<option value="Pages">Pages</option>
<option value="Blog">Blog</option>
</select>
<input name="myBtn" type="submit">
<br>
</form>
<div>
<?php echo $search_output; ?>
</div>
</body>
</html>