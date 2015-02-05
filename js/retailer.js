var roundtime=0,timediff,total_delay=0,currtime,roundno=1,timeforeveryround=10000;
function poll(){
     
      //do some calculation and decide order
var pendingorder=parseInt($('#Porder').text()); 
var tmp=pendingorder*timeforeveryround/1000; 
total_delay= +total_delay + +(tmp/3600);
//alert('time delay for current round is:'+total_delay);
total_delay=total_delay.toFixed(4); 

    $.ajax({
                            type:"post",
                            url:"delay.php",
                            data: {teamid:team_id,delay:total_delay,roundno:roundno},
                            success:function(data){}
                            });

    roundno++;
    timediff=0,total_delay=0; 
     var d = new Date();
    roundtime = d.getTime(); 

     if(roundno==7){
      clearInterval(clear);}


   };
   var clear=setInterval(poll, 10000);



   function calculate(){
    var pendingorder=parseInt($('#Porder').text());
    var supply=$('#supply').val();
    var s= new Date();
    currtime = s.getTime(); 
    timediff=currtime-roundtime;
    timediff=(timediff/1000)/3600;
    //alert(timediff);
   total_delay = +total_delay + +(pendingorder/supply)*timediff;
   total_delay=total_delay.toFixed(4); 
   //alert(total_delay);


}
