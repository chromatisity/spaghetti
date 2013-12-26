<?php
    session_start();
    if(!isset($_SESSION['username'])) {
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" type="text/css" href="stylesheet1.css">
	<script type="text/javascript" src="js.js"></script>
    <title></title>
    
</head>
<body>
	 <div id="Wrapper">
        <a href="logout.php">log out</a>
          You are logged in!
        </div>
	<canvas id="canvas">

        </canvas>
</body>
</html>