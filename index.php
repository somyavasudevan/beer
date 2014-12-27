
<html>
<head>
<script type="text/javascript" src="jquery.js"></script>
<link rel="stylesheet" href="magnific-popup/magnific-popup.css"> 
<link rel="stylesheet" type="text/css" href="lightbox.css">
<!-- Magnific Popup core JS file -->
<script src="jquery.js"></script>

<link rel="stylesheet" type="text/css" href="layout.css">
</head>

<body>
<center>
	<h1>BEER Factory</h1>
</center>


<div class="box effect">
	<div class="login">
        
        <br><br>
        <p><center><h3>LOGIN WITH YOUR ID</h3></center></p> 
        <center><h3>ID:       <input type="ID" id="loginid"></h3>
        </center>
        <center>
        	<button onclick="check($('#loginid').val())">LOGIN</button>
        </center>
	</div>



</div>
<form method="post" id="f1">
<input type="hidden" name="name" id="1">
</form>
</body>
</html>

<script>
	function check(s) { 
                document.getElementById('1').value=s;
                
                $.ajax({
                            type:"post",
                            url:"check.php",
                            data: {s:s},
                            success:function(data){
                              if(data==1){var frm=document.getElementById('f1');document.getElementById('f1').action="retailerStage.php";frm.submit();}
                              else if (data==2) {var frm=document.getElementById('f1');document.getElementById('f1').action="wholesalerStage.php";frm.submit();}
                              else if (data==3) {var frm=document.getElementById('f1');document.getElementById('f1').action="DistributerStage.php";frm.submit();}
                              else if (data==4) {var frm=document.getElementById('f1');document.getElementById('f1').action="FactoryStage.php";frm.submit();}
                              else {alert("YOUR ID DOES NOT EXIST. ENTER A VALID ID")};
                            }
                               });

	}
</script>