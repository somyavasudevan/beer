var i=0;
function poll(){
       $.ajax({
           type: "POST", 
           url: "demand.php",
		   data:{index:i},
           success: function(data){
              // do something with data
			 $("#yo").text(data);
			 alert("New order");
           }

       });
	   i++;
	   
	   if(i==7){
			clearInterval(id);}
   };
   var id=setInterval(poll, 5000);