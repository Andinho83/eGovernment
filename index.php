<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" media="screen" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.2/angular.min.js"></script>
	<title>eGovernment | Login</title>
</head>
<body>

<?php

error_reporting(E_ALL);

require_once('db.php');

if(isset($_POST['submit']))
{
	$db = DatabaseManager::getInstance();
	$mysqli = $db->getConnection();
	$stmt = $mysqli->prepare("SELECT `name`, `password` FROM `user` WHERE `name` = ? AND `password` = ?");
	$stmt->bind_param("ss", $name, $password);
	$name = $_POST['name'];
	$password = sha1($_POST['password']);
	$stmt->execute();
	$stmt->store_result();
	
	if ($stmt->num_rows == 1) {
		echo "<p><b>Login war erfolgreich!</b></p>";
	}
	
	$stmt->close();
}

?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
	<table>
		<tr>
			<td><label>User: </label></td>
			<td><input type="text" name="name" /></td>
		</tr>
		<tr>
			<td><label>Password: </label></td>
			<td><input type="password" name="password" /></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Login" /></td>
		</tr>
	</table>
</form>

<p><a href="register.php">Registration</a></p>

</body>
</html>