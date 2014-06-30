$(document).ready(function(){
	
	/* The following code is executed once the DOM is loaded */
	
	var count = 0;
	var flip1 = null;
	
	$('.cardFlip').bind("click",function(){
		

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
											
											//Checks to see if there is a match for selected slots.									
											$.get('calls.php?action=getMatch&slotY='+flip1.attr('id') +'&slotX='+currentId, function(data) {
												if(data){

													console.log("Match found!");

													//keep selected flipped.
													flip1.data('flipped',true);
													elem.data('flipped',true);

												}else{

														// lag bug found: investigate a better way other then reloading page as a work around.
														setTimeout(function(){

															console.log("No Match found!");

																flip1.revertFlip();
																flip1.data('flipped',false);
																
																elem.revertFlip();
																elem.data('flipped',false);	

																location.reload();	//resets deck, stops cheating.							

														}, 500); //sleeps to allow second image to load on flip.
												
													}
											});	
									}	
										
								}
						});
			
			});
		}
		
	});
	
});
