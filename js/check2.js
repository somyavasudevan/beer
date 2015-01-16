setInterval(function(){$.ajax({
                            type:"post",
                            url:"player.php",
                            data: {curr:curr,prev:prev},
                            success:function(data){console.log(data);
                                if(data!='None')
                                 {setTimeout(function(){ alert(data); var res = data.split(" ");
								 //alert(res[5]);
								 $('#Porder').text(parseInt($('#Porder').text())+parseInt(res[5]))}, 5000);
                                                                  supplybackup();} 
                                 }
                             });}, 1000);   

