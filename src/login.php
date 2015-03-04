<?php
session_start();
?>

<html>
<head>
	<title>Form</title>
</head>
<body>
	<form action="content1.php" method="post">
	<label for="username">Username</label>
	<input type="text" name="username" id="username" /><br/>
	<input type="submit" value="Login"/>
</body>
</html>