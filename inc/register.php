<?php

error_reporting(E_ALL);

require_once('db.php');

if(isset($_POST['submit'])) {
	$db = DatabaseManager::getInstance();
	$mysqli = $db->getConnection();
	$stmt = $mysqli->prepare("INSERT INTO `user` (`surname`, `name`, `password`) VALUES (?, ?, ?)");
	$stmt->bind_param("sss", $surname, $name, $password);
	$surname = $_POST['surname'];
	$name = $_POST['name'];
	$password = sha1($_POST['password']);
	$stmt->execute();
	echo "<p><b>Registrierung war erfolgreich!</b></p>";
	$stmt->close();
}

?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
	<table>
		<tr>
			<td><label>Surname: </label></td>
			<td><input type="text" name="surname" /></td>
		</tr>
		<tr>
			<td><label>Name: </label></td>
			<td><input type="text" name="name" /></td>
		</tr>
		<tr>
			<td><label>Password: </label></td>
			<td><input type="password" name="password" /></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Register" /></td>
		</tr>
	</table>
</form>
