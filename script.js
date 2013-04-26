$(document).ready(function(){
	/* The following code is executed once the DOM is loaded */
	
	//var nomatch = '<img src="img/card.jpg"/>';
	var count = 0;
	var flip1 = null;
	
	$('.cardFlip').bind("click",function(){
		
	/*	if(count >= 2){
			elem.revertFlip();
			flip1.revertFlip();
			console.log("killed click");
			return false;
		}	
	*/	
		// $(this) point to the clicked .cardFlip element (caching it in elem for speed):
		var elem = $(this);
		var currentId = $(this).attr('id');
		
		if(elem.data('flipped'))
		{					
			// If the element has already been flipped, do nothing
			console.log("Slot already flipped");
			return false;

		}else{
				$.get('calls.php?action=getCard&slot='+currentId, function(data) {	
					
					count = count + 1;
					console.log("Click count# "+count);					
					
					elem.data('shuffle','<img src="img/deck/'+data+'.png" />');
					elem.data('flipped',true);
				
					console.log("Slot#"+currentId+" selected and found "+data);
				
				
			
			// Using the flip method defined by the plugin:
			elem.flip({
				direction:'lr',
				speed: 200,
				content: elem.data('shuffle'),
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
			
			});
		}
		
	});
	
});
