<?php
include "Templates/login.inc.php";

if ( array_key_exists("comment_id", $_POST) && array_key_exists("src", $_POST) ) {
	$cid = $_POST['comment_id'];
	$src = $_POST['src'];
} else {
	die("Nicht genug Angaben übermittelt, bitte kontaktiere die Entwickler.");
}

if( array_key_exists("name", $_POST) ){
	$name = $_POST['name'];
	$header = "Location: https://abizeitung.rubidium.ml/" . $src . "?name=" . $name;
}else{
	$header = "Location: https://abizeitung.rubidium.ml/" . $src;
}

$ps = $mysqli->prepare("SELECT * FROM comments WHERE id = ?");
$ps->bind_param("i", $cid);
$ps->execute();
$result = $ps->get_result();

if (mysqli_num_rows($result) == 0) {
    header($header);
} else {
    $row = $result->fetch_assoc();

    if ($row['author'] != $user && $row['userid'] != $user) {
        die ("Keine Berechtigung!");
    }


    $ps = $mysqli->prepare("DELETE FROM comments WHERE id = ?");
    $ps->bind_param("i",  $cid);
    $ps->execute();
}

header($header);
