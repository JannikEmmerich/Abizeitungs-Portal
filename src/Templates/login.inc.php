<?php
if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || $_SERVER['PHP_AUTH_USER'] == "" || $_SERVER['PHP_AUTH_PW'] == "" || isset($_GET['login'])) {
	header('HTTP/1.1 401 Unauthorized');
	header('WWW-Authenticate: Basic realm="Bitte melde Dich an"');
	echo 'Du musst Dich anmelden, um das Portal verwenden zu können!';
	exit;
} else {
	include "Templates/database_connect.inc.php";
	$user = $_SERVER['PHP_AUTH_USER'];
	$password = $_SERVER['PHP_AUTH_PW'];

	$ps = $mysqli->prepare("SELECT username, password FROM users WHERE id = ?");
	$ps->bind_param("s", $user);
	$ps->execute();

	$result = $ps->get_result();
	$arr = $result->fetch_assoc();

	if (mysqli_num_rows($result) != 1) {
		header('HTTP/1.1 401 Unauthorized');
		header('WWW-Authenticate: Basic realm="Bitte melde Dich an"');
		echo 'Du musst Dich anmelden, um das Portal verwenden zu können!';
		exit;
	}

	if (!password_verify($password, $arr['password'])) {
		header('HTTP/1.1 401 Unauthorized');
		header('WWW-Authenticate: Basic realm="Bitte melde Dich an"');
		echo 'Du musst Dich anmelden, um das Portal verwenden zu können!';
		exit;
	}
}
