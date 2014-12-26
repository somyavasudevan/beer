
function cost(){
       $.ajax({
           type: "POST", 
           url: "cost.php",
		   data:{id:curr,icost:$('#Icost>span').text(),bcost:$('#Bcost>span').text(),porder:$('#Porder').text(),inv:$('#Inv').text()},
           success: function(data){
              // do something with data
			  var res=data.split(" ");
			 $("#Icost>span").text(res[0]);
			 $("#Bcost>span").text(res[1]);
			 //alert(res[2]);
			 //alert(data);
			 console.log(data);
			
           }

       });
	   
	  /* if(i==7){
			clearInterval(id);}*/
   };
   var id=setInterval(cost, 5000);