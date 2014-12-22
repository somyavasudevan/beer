function show(){
/*$.magnificPopup.open({
  items: {
    src: '<div class="white-popup">Dynamically created popup</div>', // can be a HTML string, jQuery object, or CSS selector
    type: 'inline'
  }
});*/


$.ajax({
                            type:"post",
                            url:"player.php",
                            data: {show:'1'},
                            success:function(data){
								//alert(data);
								$.magnificPopup.open({
								  items: {
									src: data, // can be a HTML string, jQuery object, or CSS selector
									type: 'inline'
								  },
								  closeBtnInside: true
								});
                      }
                             });
							 
							 
							 
}
