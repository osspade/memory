<?php

class engine{
	
	public $cards = array('facebook','adobe','microsoft','sony','dell','ebay','digg','google','ea','mysql','yahoo','hp');

	public function __construct($call = false) {		
		session_start();
		
		if($call){
			return $call;			
			}
			
		$firstHalf = $secondHalf = range(0,count($this->cards)-1 );
	
		shuffle($firstHalf);
		shuffle($secondHalf);
		
		$_SESSION['fullDeck'] = array_merge($firstHalf,$secondHalf);
	}		
		
		
	function getMatch($slot1,$slot2){
		session_start();
		$match1 = $_SESSION['fullDeck'][$slot1];
		$match2 = $_SESSION['fullDeck'][$slot2];

		if( $this->cards[ $match1 ] == $this->cards[ $match2 ] ){
			return true;
		}else{
			return false;
			}
			
	}
	
	
	function getCard($slot){
		session_start();
		
		return $this->cards[ $_SESSION['fullDeck'][$slot] ];				
		}
		
		
		function playingBoard(){					
				for($i=0;$i<=(count($this->cards)*2)-1;$i++){
					echo'
					<div class="card">
						<div class="cardFlip" id="'.$i.'">
							<img src="img/card.jpg" />
						</div>
					</div>				
					';
					
				}			

			}
		
}


?>
