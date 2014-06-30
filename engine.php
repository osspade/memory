<?php

/**
 * Core of the 6x4 Game.
 *
 * @package ENGINE
 */


class engine{
	
	public $cards = array('facebook','adobe','microsoft','sony','dell','ebay','digg','google','ea','mysql','yahoo','hp');

/**
 * Check on engine start to see what type of initialization is needed
 *
 * @param bool $call.
 *
 * @return array Returns an array of rewrite rules
 */
	public function __construct($call = false) {		
		session_start();
		
			if($call){

				$this->calls();			

			}else{
			
				$this->init();

			}
	}		

/**
 * Ajax calls, depending on selected slot, prints/echo data to be returned.
 *
 * @param none.
 *
 * @return void
 */		
	function calls(){
			
		switch ($_REQUEST['action']) {
		    case "getMatch":
					echo $this->getMatch($_REQUEST['slotX'],$_REQUEST['slotY']); 
				break;
		    case "getCard":
					echo $this->getCard($_REQUEST['slot']);
				break;
			}

	}
	
/**
 * Sets/Starts game or resets game deck 
 *
 * @param none.
 *
 * @return void
 */

	function init(){

		if( empty($_SESSION['fullDeck']) ){
			
			$firstHalf = $secondHalf = range(0,count($this->cards)-1 );	
			shuffle($firstHalf); shuffle($secondHalf);						
			$_SESSION['fullDeck'] = array_merge($firstHalf,$secondHalf);
		}

		if($_REQUEST['reset']){

			session_destroy();
			header("Location: index.php");
			die();
		}


	}

/**
 * Checks slots to see if there is a match between selected
 *
 * @param integer $slot1, $slot2.
 *
 * @return bool
 */	
	function getMatch($slot1,$slot2){

		$match1 = $_SESSION['fullDeck'][$slot1];
		$match2 = $_SESSION['fullDeck'][$slot2];

		if( $this->cards[ $match1 ] == $this->cards[ $match2 ] ){

			$_SESSION['matched'][$slot1] = $match1;
			$_SESSION['matched'][$slot2] = $match2;
			return true;

		}else{

			return false;
			}
			
	}
	
	
/**
 * Checks slots id and return cardname.
 *
 * @param integer $slot.
 *
 * @return string
 */	

	function getCard($slot){
		
		return $this->cards[ $_SESSION['fullDeck'][$slot] ];				
	}
		
		
/**
 * Checks matched slots on load, and draws the game board.
 *
 * @param none
 *
 * @return void
 */	
	function playingBoard(){

print_r($_SESSION['matched']);
print_r($_SESSION['fullDeck']);
			for($i=0;$i<=(count($this->cards)*2)-1;$i++){
			
			$matchedSlot = $_SESSION['matched'][$i];
			$matchedCard = $this->cards[ $_SESSION['fullDeck'][$i] ];

				if($matchedSlot){
				
					echo'
					<div class="card">
						<div class="cardFlipped" id="'.$i.'">
							<img src="img/deck/'.$matchedCard.'.png" />
						</div>
					</div>				
					';

				}else{

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
	
}