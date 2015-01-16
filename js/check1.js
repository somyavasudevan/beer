setInterval(function(){$.ajax({
                            type:"post",
                            url:"player.php",
                            data: {curr:curr,next:next},
                            success:function(data){
                                if(data!='None')
                                 {setTimeout(function(){ alert(data);
                                 var res = data.split(" ");
                                 //alert(res[3]);
                                 $('#Inv').text(parseInt($('#Inv').text())+parseInt(res[3]));}, 5000);
                                supplybackup();} 
                             

                                 }
                             });}, 1000);   