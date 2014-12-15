<?php
include_once("config.lib.php");


$SQLCommand = "SELECT demand FROM customer";

$result = mysqli_query($conn,$SQLCommand); // This line executes the MySQL query that you typed above

$yourArray = array(); // make a new array to hold all your data

$index=0;

while($row = mysqli_fetch_assoc($result)) // loop to give you the data in an associative array so you can use it however.
{
     //echo implode(" ",$row);
	 $yourArray[$index] = $row;
	 //echo implode(" ",$row);
     $index++;
}

if(isset($_POST['index'])){
	$value=$_POST['index'];
	echo implode(" ",$yourArray[$value]);
	}
	
?>
