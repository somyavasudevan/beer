<?php
?>


<html>
<head>
<script type="text/javascript" src="jquery.js"></script>
<link rel="stylesheet" type="text/css" href="layout.css">
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
	<h2>DISTRIBUTOR</h2>
</center>
</div>
<div class="innerBox2">
<center>
	<h2>WHOLESALER</h2>
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
	<h2>RETAILER</h2>
</center>
</div>
</div>
</body>

</html>