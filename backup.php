<?php
include_once("config.lib.php");

$backup=$_POST['backup'];
$curr=$_POST['curr'];
if (isset($_POST['backup']) && isset($_POST['curr'])) 
{
    $sql= "SELECT * FROM  `backup` WHERE  `id` ='$curr'";
    $set=0;
    if ($conn->query($sql) == TRUE)
    {          

  $result=mysqli_query($conn,$sql);
  if($result){
 $found=mysqli_num_rows($result); 

  if($found>0){ 
  while($row = mysqli_fetch_array($result))
  {
   $var1= $row['inventory']; $var2=$row['pendingorder'];
   $var3= $row['reserve'];$var4= $row['capacity'];
  $set=1;
  } 
   }  
}

    }
	
	if($set==0){
	echo '20 30 1000 30';
	}

  else{//ELSE REQUIRED
  echo $var1." ".$var2." ".$var3." ".$var4;
  }

  



  $sql= "SELECT * FROM  `cost` WHERE  `playerid` ='$curr' ORDER BY `sno` DESC LIMIT 1";
    $set=0;
    if ($conn->query($sql) == TRUE)
    { 

  $result=mysqli_query($conn,$sql);
  if($result){
 $found=mysqli_num_rows($result); 

  if($found>0){ 
  while($row = mysqli_fetch_array($result))
  {
   $var1= $row['icost']; $var2=$row['bcost'];
  $set=1;
  } 
   }  
}

	}
	
	
	if($set==0){
	//echo "None";
	echo ' 200 300 ';
	
	}
	
	
	else{
  echo " ".$var1." ".$var2;
}


}

?>