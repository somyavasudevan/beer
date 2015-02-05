<?php
include_once("config.lib.php");

if(isset($_POST["teamid"])){

//echo "successfully";


$team="team".$_POST["teamid"];
$delay=$_POST["delay"];
$roundno=$_POST["roundno"];


$query ="SELECT * FROM delay WHERE sno=$roundno";
$result=mysqli_query($conn,$query);
$found=mysqli_num_rows($result); 

if($found==0)
{  echo "0";
	 $sql = "INSERT INTO delay ($team) VALUES ($delay)";
    if ($conn->query($sql) === TRUE) {
    echo " New record created successfully";
    }
    else{
    	echo " Error: " . $sql . "<br>" . $conn->error;
    }
}
else
{  echo "1";
	$sql="UPDATE delay SET ".$team."=".$delay." WHERE sno=".$roundno;
    if ($conn->query($sql) === TRUE) {
    echo " UPDATED";
    }
    else{
    	echo " Error: " . $sql . "<br>" . $conn->error;
    }
}
}


$conn->close();



?>
