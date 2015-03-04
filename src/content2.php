<?php
session_start();

if($_SESSION['logged_in'] == 0){
		echo '<script> window.location="http://web.engr.oregonstate.edu/~martinad/assignment4-part1Rework/src/login.php"</script>';
	}
	
	echo '<a href="content1.php">content1</a> '
?>