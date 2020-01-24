<?php
include "Templates/login.inc.php";

$citation = $_POST['citation'];
$userid = $_POST['userid'];
$type = $_POST['type'];
$action = $_POST['act'];

if($action == "INSERT"){
	$ps = $mysqli->prepare('INSERT INTO ' . $type . '_citations (userid, author, citation) VALUES (?,?,?)');
	$ps->bind_param("iis", $userid, $user, $citation);
	$ps->execute();
}else if($action == "UPDATE" or $action == "DELETE"){
	if(array_key_exists("citation_id", $_POST)){
		$cid = $_POST["citation_id"];
	}
	$ps = $mysqli->prepare('SELECT author FROM ' . $type . '_citations WHERE id = ?');
	$ps->bind_param("i", $cid);
	$ps->execute();
	$result=$ps->get_result();
	if (mysqli_num_rows($result) == 0) {
		header("Location: https://abizeitung.rubidium.ml/citation.php");
	} else {
		$row = $result->fetch_assoc();
		if($row["author"] == $user){
			if($action == "UPDATE"){
				$ps = $mysqli->prepare('UPDATE ' . $type . '_citations SET citation = ? WHERE id = ?');
				$ps->bind_param("si", $citation, $cid);
				$ps->execute();
			}else if ($action == "DELETE"){
				$ps = $mysqli->prepare('DELETE FROM ' . $type . '_citations WHERE id = ?');
				$ps->bind_param("i", $cid);
				$ps->execute();
			}
		}
	}
}else{
	die("Keine Aktion angegeben. Bitte kontaktiere die Entwickler!");
}

header("Location: https://abizeitung.rubidium.ml/citation.php");
