<?php 

// unset all session variables
$_SESSION = array();

if( session_destroy() ) {
	header("Location: index.php?id=home");
}

?>