<?php 

session_destroy();
if( isset($_SESSION['user']) ) {
	unset($_SESSION['user']);
}
echo "<p><b>Logout successful!</b></p>";

?>