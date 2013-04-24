$(document).ready(function(){
	/* The following code is executed once the DOM is loaded */
	var count = 0;
	var flip1 = null;

	$('.cardFlip').bind("click",function(e){
		

				// $(this) point to the clicked .cardFlip element (caching it in elem for speed):
		
		var elem = $(this);
		var currentId = $(this).attr('id');
		
		// data('flipped') is a flag we set when we flip the element:
		
		if(elem.data('flipped'))
		{
			
			
			// If the element has already been flipped, use the revertFlip method
			// defined by the plug-in to revert to the default state automatically:
			
			//	elem.revertFlip();
			
			// Unsetting the flag:
			//elem.data('flipped',false)
			console.log("Slot already flipped");
			return false;

		}else{
			// Using the flip method defined by the plugin:
			
		count = count + 1;
		
		console.log("Click count# "+count);
		
		
			elem.flip({
				direction:'lr',
				speed: 200,
				onBefore: function(){
				elem.data('flipped',true);
					$.get('calls.php?action=getCard&slot='+currentId, function(data) {
						console.log("Slot#"+currentId+" selected and found "+data);

						elem.html('<img src="img/deck/'+data+'.png"/>');
					});
				},
				onEnd: function(){
					
					
					if(count == 1){
						flip1 = elem;
					}
					
					if(count == 2){
						count = 0;										
						$.get('calls.php?action=getMatch&slotY='+flip1.attr('id') +'&slotX='+currentId, function(data) {
							if(data){							
								console.log("Match found!");
								flip1.data('flipped',true);
								elem.data('flipped',true);
							}else{
								//a delay function needs to be implemented.	
								console.log("No Match found!");								
								flip1.revertFlip();
								flip1.data('flipped',false);
								elem.revertFlip();
								elem.data('flipped',false);
								
								}
						});
						
					}	
						
				}
			});
			
		}
	});
	
});
