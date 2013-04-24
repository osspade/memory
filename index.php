<?php
include ('engine.php');
$engine = new engine();
?>
<!DOCTYPE html>
<html>
<head>
<title>6x4 Memory Game</title>
<link rel="stylesheet" type="text/css" href="styles.css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="jquery.flip.min.js"></script>
<script type="text/javascript" src="script.js"></script>

</head>

<body>

<div id="main">

	<div class="cardListHolder">

		
<?php 
$engine->playingBoard();       
?>      
    	<div class="clear"></div>
    </div>

</div>

</body>
</html>
