<?php
session_start();
echo "<h1>Secret area</h1>";
echo "<p>Willkommen Herr ".$_SESSION['user'].".</p>";
?>