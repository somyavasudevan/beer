var i=0;
function cost(){
       $.ajax({
           type: "POST", 
           url: "cost.php",
		   data:{icost:$('#Icost').text(),bcost:$('#Bcost').text(),porder:$('#Porder').text(),inv:$('#Inv').text()},
           success: function(data){
              // do something with data
			  var res=data.split(" ");
			 $("#Icost").text(res[0]);
			 $("#Bcost").text(res[1]);
			 //alert(res[2]);
           }

       });
	   i++;
	   
	   if(i==7){
			clearInterval(id);}
   };
   var id=setInterval(cost, 10000);