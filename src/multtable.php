<html>
<head>
<title>table php</title>
</head>
<body>
<table border="1">
<?php
	$err = false;
	
	$min_multiplicand = $_GET['min_multiplicand'];
	$max_multiplicand = $_GET['max_multiplicand'];
	$min_multiplier = $_GET['min_multiplier'];
	$max_multiplier = $_GET['max_multiplier'];
	
	
	echo("min_multiplicand: " . $min_multiplicand);
	echo("<br/>max_multiplicand: ". $max_multiplicand);
	echo("<br/>min_multiplier " . $min_multiplier);
	echo("<br/>max_multiplier " . $max_multiplier);
	echo ("<br/>");
	
	//check all values for data and integer type
	if(checkValue($min_multiplicand, "min_multiplicand") == false) {
		$err = true;
	}
	
	if(checkValue($max_multiplicand, "max_multiplicand") == false) {
		$err = true;
	}
	
	if(checkValue($min_multiplier, "min_multiplier") == false) {
		$err = true;
	}
	
	if(checkValue($max_multiplier, "max_multiplier") == false) {
		$err = true;
	}
	
	//chack min max
	if($err == false) {
		if(checkMultiplicand($min_multiplicand, $max_multiplicand) == false) {
			$err = true;
			echo("<br/>Minimum [multiplicand] larger than maximum");
		}
		
		if(checkMultiplier($min_multiplier, $max_multiplier) == false) {
				$err = true;
				echo("<br/>Minimum [multiplier] larger than maximum");
		}

		if($err == false) {
			createTable($min_multiplicand, $max_multiplicand, $min_multiplier, $max_multiplier);
		}
	}
	//functions
	function createTable($minC, $maxC, $minR, $maxR) {
		$i = $minC;
		$j = $minR;
		
		createTopRow($minR, $maxR);
		
		while($i <= $maxC) {
			createRow($i, $minR, $maxR);
			$i++;
		}
	}
	
	function createTopRow($min, $max) {
		$idx = $min;
		
		echo ("<tr>");
		echo("<td></td>");
		while ($idx <= $max){
			echo("<td>$idx</td>");
			$idx++;
		}
	}
	
	function createRow($multiplicand, $min, $max){
		$row_index = $min;
		echo("<tr>");
		echo("<td>$multiplicand</td>");
		
		while($row_index <= $max) {
			echo("<td>" . $multiplicand * $row_index . "</td>");
			$row_index++;
		}
	}
	
	function checkValue($value, $var_name){
		if(isEmpty($value) == true) {
			echo("<br/>Missing parameter [" . $var_name . "].");
			return false;
		} else if(isInt($value) == false) {
			echo("<br/>[" . $var_name . "] must be an integer.");
			return false;
		} else {return true;}
	}
	
	function isInt($entry) {
		if($entry == '0') {
			return true;
		} else if ($entry * 1 == 0){
				return false;
			} else {return true;}
	}
	
	function isEmpty($entry) {
			if(strlen($entry) == 0) {
				return true;
			} else {return false;}
	}
	
	function isInteger($entry) {
		if(gettype($entry) == integer) {
			return true;
		} else {return false;}
	}
	
	function checkMultiplicand($min, $max) {
		if(lessEqual($min, $max)) {
			return true;
		} else {return false;}
	}
	
	function checkMultiplier($min, $max) {
		if(lessEqual($min, $max)) {
			return true;
		} else { return false;}
	}
	
	function lessEqual($left, $right) {
		if($left <= $right) {
			return true;
		}
		else { return false;}
	}
?>

</table>
</body>
</html>