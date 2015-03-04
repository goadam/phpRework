
<?php
session_start();
	if(!isset($_SESSION['visits'])) {
		$_SESSION['visits'] = 0;
	}
	
	if(!isset($_SESSION['logged_in'])) {
		$_SESSION['logged_in'] = 0;	
	}
	
	if(!isset($_POST['username']) && $_SESSION['logged_in'] == 0){
		echo '<script> window.location="http://web.engr.oregonstate.edu/~martinad/assignment4-part1Rework/src/login.php"</script>';
	} else {
		if(isset($_POST['username'])) {
			$username = $_POST['username'];
			if(strlen($username) > 0) {
				if($_SESSION['logged_in'] == 0) {
					$_SESSION['username'] = $_POST['username'];
					$_SESSION['logged_in'] = 1;
				}
			}  else {
				if($_SESSION['logged_in'] == 0) {
					echo ("A username must be entered.<br/>");
					echo ("Click ");
					echo '<a href="login.php">here</a>';
					echo (" to return to the login screen.");
				}
			}
		}
		
		if($_SESSION['logged_in'] == 1) {
			echo ("Hello " . $_SESSION['username'] . " you have visited this page " . $_SESSION['visits'] . " times before.");
			$_SESSION['visits']++;
			echo ("<br/>Click ");
			echo '<a href ="logout.php">here</a>'; 
			echo(" to logout.<br>");
			echo '<a href="content2.php">content2</a>';
		}
	}
	
?>