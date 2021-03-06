 <!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" media="screen" href="css/template.css">
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.2/angular.min.js"></script>
	<title>eGovernment</title>
</head>
<body>

<?php 
if ( empty($_SESSION) ) {
	session_start(); 
}
?>

<main>
	<header>#HEADER</header>
	<nav>
		<ul>
			<li><a href="index.php?id=login">Login</a></li>
			<li><a href="index.php?id=register">Register</a></li>
			<?php
			if ( !empty($_SESSION) && isset($_SESSION['user']) ) {
				echo "<li><a href=\"index.php?id=logout\">Logout</a></li>";
			}
			?>
		</ul>
	</nav>
	<article><?php include_once('ContentManager.php'); ?></article>
	<footer>#FOOTER</footer>
</main>

</body>
</html>