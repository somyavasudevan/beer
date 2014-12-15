<?php

include_once("config.lib.php");


$supply=$_POST["supply"];
$order=$_POST["order"];
$round=$_POST["round"];
$flag=$_POST["f"];

echo $supply;
echo $order;
echo $round;

if($flag==2){
$sql = "INSERT INTO player (playerid, round, placedorder, supply, flag)
VALUES ('21',$round,$order,$supply,$flag)";

if ($conn->query($sql) === TRUE) {
    echo " New record created successfully";
} else {
    echo " Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
}

?>