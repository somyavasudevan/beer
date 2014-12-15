<?php
$id=$_POST['name'];
session_start();
$_SESSION["id"]=$id;
echo $id;
/*if(isset($_POST['s'])){
	echo "hey";
	if($_SESSION["id"]=='11'){
		echo "hi";
		}
		}*/
?>


<html>
<head>
<script type="text/javascript" src="jquery.js"></script>
</head>

<body>
<center>
	<h1>BEER Factory</h1>
</center>

<center>
	<h2>DISTRIBUTOR</h2>
</center>

<div id="orderdiv" style="position:absolute; margin-left:450px; margin-top:50px">
	<p>Order:</p>
	<input type="number" id="order" name="order" min="1">
	<input type="button" id="orderbutton" onclick="order()" value="ok">
</div>

<div id="supplydiv" style="position:absolute; margin-left:700px; margin-top:50px">
	<p>Supply:</p>
	<input type="number" id="supply" name="supply" min="1">
	<input type="button" id="supplybutton" class="supplybutton" onclick="supply()" value="ok">

</div>
<div>
	<p>Round No:</p>
	<p id="Round">1</p><br>
	<p id="yo">Welcome</p>
	<p>Icost:</p>
	<p id="Icost">200</p>
	<p>Bcost:</p>
	<p id="Bcost">300</p>
	<p>pending-order:</p>
	<p id="Porder">20</p>
	<p>Inventory:</p>
	<p id="Inv">30</p>
</div>
<br>
PLAYER TABLE 
<div id="result" style="position:absolute; margin-top=2500px">

</div>

</body>
<script src="jquery.js"></script>
<script type="text/javascript">

     var flag=0;

	 function supply(){  
                         flag=1;
	 	                 alert(sup);               
                         $.ajax({
                            type:"post",
                            url:"player.php",
                            data: {supply:$('#supply').val(), 
									order:0,
                                   round:$('#Round').text(),
                                   f:flag},
                            success:function(data){
                                //$("#result").html(data);
                             },
                             
                          });
                      }
              function order(){  
                         flag=2;               
                         $.ajax({
                            type:"post",
                            url:"player.php",
                            data: {order:$('#order').val(),
									supply:'0',
                                   round:$('#Round').text(),
                                   f:flag},
                            success:function(data){
                                //alert("order has been placed");
                      }
                             });
                             
                      }
    
                      
</script>

</html>