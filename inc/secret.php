<?php

if ( !empty($_SESSION) ) {
	echo "<h1>Secret area</h1>";
	echo "<p>Willkommen ".$_SESSION['user'].".</p>";
}
else {
	echo "<p><b>Sie sind nicht eingeloggt!</b></p>";
}

?>