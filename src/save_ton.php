<?php
include "Templates/login.inc.php";

$text = $_POST['text'];
$userid = $_POST['userid'];
$type = $_POST['type'];
$action = $_POST['act'];
if($action == "INSERT"){
	$ps = $mysqli->prepare('INSERT INTO trueornot (author, text) VALUES (?,?)');
	$ps->bind_param("is", $user, $text);
	$ps->execute();
}else if($action == "UPDATE" or $action == "DELETE"){
	if(array_key_exists("ton_id", $_POST)){
		$tid = $_POST["ton_id"];
	}
	$ps = $mysqli->prepare('SELECT author FROM trueornot WHERE id = ?');
	$ps->bind_param("i", $tid);
	$ps->execute();
	$result=$ps->get_result();
	if (mysqli_num_rows($result) == 0) {
		header("Location: https://abizeitung.rubidium.ml/citation.php");
	} else {
		$row = $result->fetch_assoc();
		if($row["author"] == $user){
			if($action == "UPDATE"){
				$ps = $mysqli->prepare('UPDATE trueornot SET text = ? WHERE id = ?');
				$ps->bind_param("si", $text, $tid);
				$ps->execute();
			}else if ($action == "DELETE"){
				$ps = $mysqli->prepare('DELETE FROM trueornot WHERE id = ?');
				$ps->bind_param("i", $tid);
				$ps->execute();
			}
		}
	}
}else{
	die("Keine Aktion angegeben. Bitte kontaktiere die Entwickler!");
}

header("Location: https://abizeitung.rubidium.ml/citation.php");
