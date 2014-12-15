<?php


/*$connection = mysql_connect(SERVER, USERNAME, SERVER_PASSWORD);
if(!$connection){
	die ("Database connection failed: " . mysql_error());
}
$db_select = mysql_select_db(DATABASE,$connection);
if(!$db_select){
	die ("Database connection failed: " . mysql_error());
}*/

$conn = new mysqli(SERVER, USERNAME, SERVER_PASSWORD,DATABASE);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


?>
