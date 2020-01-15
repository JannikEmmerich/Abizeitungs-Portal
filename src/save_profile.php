<?php
include "Templates/login.inc.php";

$question1 = $_POST['question1'];
$question2 = $_POST['question2'];

$ps = $mysqli->prepare("DELETE FROM profiles where userid = ?");
$ps->bind_param("s", $user);
$ps->execute();

$ps = $mysqli->prepare("INSERT INTO profiles (userid, question1, question2) VALUES(?, ?, ?)");
$ps->bind_param("sss", $user, $question1, $question2);
$ps->execute();

header("Location: https://abizeitung.rubidium.ml/profile.php");