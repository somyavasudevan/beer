<?php
include_once("config.lib.php");
session_start();
$_SESSION["id"]=$_POST['id'];
$id=$_POST['id'];
$result = mysqli_query($conn,"SELECT * FROM team WHERE Player1=$id OR Player2=$id OR Player3=$id OR Player4=$id");
$prev=0;$next=0;
if($result)
{
        $found=mysqli_num_rows($result); 
        if($found>0)
        {  $row = mysqli_fetch_array($result);

          if($row['Player1']==$id){
            $next=$row['Player2'];
            $stage=1;
            echo '<script src="js/check1.js"></script>';
          }

          else if($row['Player2']==$id){
            $next=$row['Player3'];
            $prev=$row['Player1'];
            $stage=2;
            echo '<script src="js/check2.js"></script>';
            echo '<script src="js/check1.js"></script>';
          }

          else if($row['Player3']==$id){
            $next=$row['Player4'];
            $prev=$row['Player2'];
            $stage=3;
            echo '<script src="js/check1.js"></script>';
            echo '<script src="js/check2.js"></script>';
          }

          else if($row['Player4']==$id){
            $prev=$row['Player3'];
            $stage=4;
            echo '<script src="js/check2.js"></script>';
          }
        }

       
}



//echo $id.$next.$prev.$stage;


 echo "<script>var curr=$id;var next=$next;var prev=$prev;var stage=$stage;</script>";
?>


<html>
<head>
<script type="text/javascript" src="js/jquery.js"></script>
<script src="js/stage.js"></script>
<script src="js/transaction.js"></script>
<link rel="stylesheet" href="magnific-popup/magnific-popup.css"> 
<script src="magnific-popup/jquery.magnific-popup.js"></script>
<link rel="stylesheet" type="text/css" href="css/layout.css">
</head>

<body>
<center>
	<h1>BEER Factory</h1>
</center>

<div class="cost">
<p id="Icost">Inventory cost:<span>200</span></p>
	<p id="Bcost">Backlog cost:<span>300</span></p>
	</div>
	
	
	

<div class="box effect">
	<p id="Round">Round No:<span>1</span></p>
<div class="innerBox1">
<center>
	<h2 id="prev">RETAILER</h2>
</center>
</div>
<div class="innerBox2">
<center>
	<h2 id="curr">WHOLESALER</h2>
</center>
<div id="orderdiv" >
	<p>ORDER:</p>
	<input type="number" id="order" class="field" name="order" min="1">
	<input type="button" id="orderbutton" class="button" onclick="order()" value="ok">
</div>
<br>
<div id="supplydiv" >
	<p>SUPPLY:</p>
	<input type="number" id="supply" class="field" name="supply" min="1">
	<input type="button" id="supplybutton" class="button" onclick="supply()" value="ok">

</div>
<br>
<div class="details">
	<p>Pending order:<span id="Porder">20</span></p><br>
	<p>Inventory:<span id="Inv">30</span></p>
	</div>
</div>
<div class="innerBox3">
<center>
	<h2 id="next">DISTRIBUTER</h2>
</center>
</div>
</div>
<button onclick="show()">View Transactions</button>
</body>


<script type="text/javascript">



  var flag=0,backup=1;

////////////////START //////////////////////////////////////////////////////////////////////////////////////
  function supplybackup()
       {
                         $.ajax({
                            type:"post",
                            url:"player.php",
							//YOU HAD USED .VAL() HERE
                            data: {curr:curr,backup:'1',inventory:$('#Inv').text(),porder:$('#Porder').text()},
                            success:function(data){
                              console.log(data);
                            }
                               });
       }
//////////////////END ///////////////////////////////////////////////////////////////////////////////////////////////////////       
	

   function supply(){  
                         flag=1;
						if(($('#supply').val()<=parseInt($('#Inv').text())) && ($('#supply').val()<=parseInt($('#Porder').text()))){
							
						
                         $.ajax({
                            type:"post",
                            url:"player.php",
                            data: {id:curr,supply:$('#supply').val(), 
									order:'0',
                                   round:$('#Round>span').text(),
                                   f:flag},
                            success:function(data){
                                //$("#result").html(data);
								//alert(data);
								$('#Porder').text(parseInt($('#Porder').text())-parseInt($('#supply').val()));
								$('#Inv').text(parseInt($('#Inv').text())-parseInt($('#supply').val()));
								alert("supplied");
								supplybackup();
                             },
                             
                          });}
						  
						  else{
						alert("Invalid Transaction");}
                         
                      }



              function order(){  
                         flag=2;               
                         $.ajax({
                            type:"post",
                            url:"player.php",
                            data: {id:curr,order:$('#order').val(),
				   supply:'0',
                                   round:$('#Round>span').text(),
                                   f:flag},
                            success:function(data){
                                alert("order has been placed");
                             

                          }
                             });
                             
                      }
    




          window.onbeforeunload = function() {
        return "Do not Refresh the game. You will lose all data."; }

        window.onload=function(){
          if(stage==1){
            $('#prev').text('Customer');
            $('#curr').text('Retailer');
            $('#next').text('Wholesaler');
          }

          else if(stage==2){
            $('#prev').text('Retailer');
            $('#curr').text('Wholesaler');
            $('#next').text('DISTRIBUTOR');

          }

          else if(stage==3){
            $('#prev').text('Wholesaler');
            $('#curr').text('DISTRIBUTOR');
            $('#next').text('Factory');
          }

          else if(stage==4){
            $('#prev').text('DISTRIBUTOR');
            $('#curr').text('Factory');
            $('#next').text('');
          }


          backup=1;
                    $.ajax({
                            type:"post",
                            url:"backup.php",
                            data: {backup:'1',curr:curr},
                            success:function(data){
							var res = data.split(" ");
							$('#Inv').text(parseInt(res[0]));
							$('#Porder').text(parseInt(res[1]));
							$('#Icost>span').text(parseInt(res[2]));
							$('#Bcost>span').text(parseInt(res[3]));
                              
                            }
                               });
                  }


         
</script>
</html>
