<? php
$mysql_host = 'localhos';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'a_databases';
if (!mysql_connect($mysql_host, $mysql_user,$mysql_pass) || !mysql_select_db($mysql_db)) {
die(mysql_error());
}
?>