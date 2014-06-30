<?php

//Game session is initialized, else redrawn from session.
include ('engine.php');
$engine = new engine();

?>
<!DOCTYPE html>
<html>

<head>
	<title>6x4 Card Game</title>
	<link rel="stylesheet" type="text/css" href="styles.css" />

		<meta http-equiv="cache-control" content="max-age=0" />
		<meta http-equiv="cache-control" content="no-cache" />
		<meta http-equiv="expires" content="0" />
		<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
		<meta http-equiv="pragma" content="no-cache" />


	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
	<script type="text/javascript" src="jquery.flip.min.js"></script>
	<script type="text/javascript" src="script.js"></script>
</head>

<body>

<div id="main">
	<div class="cardReset"> <a href="index.php?reset=1">Shuffle/Reset Deck</a> | <a href="index.php">Reload Deck</a></div>
	<div class="cardListHolder">

		
		<?php 
		
			// Draw Game board
			$engine->playingBoard();       
		?> 
     
    	<div class="clear"></div>
    </div>

</div>

</body>
</html>
