

<?php
class myClass{
	public $type;
	public $parameters = array();
}
	$json = new myClass();
	
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$json->type = "POST";
		if(empty($_POST)) {
		$json->parameters = null;
		} else {
			foreach($_POST as $key => $val) {
				$json->parameters[$key] = $val;
			}
		}
	} else {
		$json->type = "GET";
		if(empty($_GET)) {
		$json->parameters = null;
		} else {
			foreach($_GET as $key => $val) {
				$json->parameters[$key] = $val;
			}
		}
	}
	
	echo json_encode($json);
?>

