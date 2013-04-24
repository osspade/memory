<?php
include ('engine.php');
$engine = new engine(true);

switch ($_REQUEST['action']) {
    case "getMatch":
			echo $engine->getMatch($_REQUEST['slotX'],$_REQUEST['slotY']); 
		break;
    case "getCard":
			echo $engine->getCard($_REQUEST['slot']);
		break;

}

?>
