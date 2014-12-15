<?php
include_once("config.lib.php");
if(isset($_POST['icost'])){
	$icost=$_POST['icost']+$_POST['inv']*2;
	$bcost=$_POST['bcost']+$_POST['porder']*3;
	echo $icost;
	echo ' ';
	echo $bcost;
	

$sql = "INSERT INTO cost (playerid, icost, bcost)
VALUES ('21',$icost,$bcost)";

if ($conn->query($sql) === TRUE) {
    echo " New record created successfully";
} else {
    echo " Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
}	
?>
