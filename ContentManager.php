<?php 

$whitelist = array('login' => 1, 'register' => 2);

if(count($_REQUEST) > 0) {
	$key = $_REQUEST['content'];
	
	if(array_key_exists($key, $whitelist)) {
		include_once("inc/$key.php");
	}
	else {
		include_once("index.php");
	}
}
else {
	include_once("index.php");
}

?>