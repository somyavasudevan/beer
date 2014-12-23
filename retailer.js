var i=0;
function poll(){
       $.ajax({
           type: "POST", 
           url: "demand.php",
		   data:{index:i},
           success: function(data){
              // do something with data
			 alert("New order"+data);
			 console.log(i);
			 $('#Porder').text(parseInt($('#Porder').text())+parseInt(data));
           }

       });
	   i++;
	   
	   if(i==7){
			clearInterval(clear);}
   };
   var clear=setInterval(poll, 20000);