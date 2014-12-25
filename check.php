<?php

include_once("config.lib.php");


if(isset($_POST['s']))
  $id=$_POST['s'];

$flag=0;


$query="SELECT * FROM  `team` WHERE  `Player1` =  '$id' ";
$result=mysqli_query($conn,$query); 

if($result)
{
        $found=mysqli_num_rows($result); 
        if($found>0)
        {
                echo "1"; $flag=1;
        }
}

$query="SELECT * FROM  `team` WHERE  `Player2` =  '$id' ";
$result=mysqli_query($conn,$query); 

if($result)
{
        $found=mysqli_num_rows($result); 
        if($found>0)
        {
                echo "2"; $flag=1;
        }
}


$query="SELECT * FROM  `team` WHERE  `Player3` =  '$id' ";
$result=mysqli_query($conn,$query); 

if($result)
{
        $found=mysqli_num_rows($result); 
        if($found>0)
        {
                echo "3"; $flag=1;
        }
}


$query="SELECT * FROM  `team` WHERE  `Player4` =  '$id' ";
$result=mysqli_query($conn,$query); 

if($result)
{
        $found=mysqli_num_rows($result); 
        if($found>0)
        {
                echo "4"; $flag=1;
        }
}

if($flag!=1)
{
        echo "5";
}

?>