<?php

echo "<h1>Login</h1>";

require_once('./db.php');

if(isset($_POST['submit'])) {
	$db = DatabaseManager::getInstance();
	$mysqli = $db->getConnection();
	$stmt = $mysqli->prepare("SELECT `name`, `password` FROM `user` WHERE `name` = ? AND `password` = ?");
	$stmt->bind_param("ss", $name, $password);
	$name = $_POST['name'];
	$password = sha1($_POST['password']);
	$stmt->execute();
	$stmt->store_result();
	
	if ($stmt->num_rows == 1) {
		$_SESSION['user'] = $_POST['name'];
		header("Location: index.php?id=secret");
		exit();
	}
	else {
		echo "<p><b>Login war nicht erfolgreich!</b></p>";
	}
	
	$stmt->close();
}

?>

<form method="post" action="index.php?id=login">
	<table>
		<tr>
			<td><label>User: </label></td>
			<td><input type="text" name="name" placeholder="Last name" /></td>
		</tr>
		<tr>
			<td><label>Password: </label></td>
			<td><input type="password" name="password" placeholder="Password" /></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Login" /></td>
		</tr>
	</table>
</form>
