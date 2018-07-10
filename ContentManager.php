<?php 

$files = array();
if( $handle = opendir("inc") ) {
	while( $file = readdir($handle) ) {
		if( strstr($file, '.php') ) {
			array_push($files, $file);
		}
	}
}

var_dump($files);

$whitelist = array(	'login' => 'inc/login.php', 
					'register' => 'inc/register.php', 
					'home' => 'inc/home.php');

if( empty($_REQUEST) ) {	
	$_REQUEST['id'] = 'home';
}
	
if( array_key_exists($_REQUEST['id'], $whitelist) ) {
	include_once($whitelist[$_REQUEST['id']]);
}
else {
	include_once($_REQUEST['id']);
}

?>