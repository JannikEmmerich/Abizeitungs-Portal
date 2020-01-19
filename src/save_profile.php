<?php
include "Templates/login.inc.php";

$birthdate = $_POST['birthdate'];
$livingplace = $_POST['livingplace'];
$question1 = $_POST['question1'];
$question2 = $_POST['question2'];
$question3 = $_POST['question3'];
$question4 = $_POST['question4'];
$question5 = $_POST['question5'];

$ps = $mysqli->prepare("DELETE FROM profiles where userid = ?");
$ps->bind_param("s", $user);
$ps->execute();

$ps = $mysqli->prepare("INSERT INTO profiles (userid, birthdate, livingplace, question1, question2, question3, question4, question5) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
$ps->bind_param("ssssssss", $user, $birthdate, $livingplace, $question1, $question2, $question3, $question4, $question5);
$ps->execute();

header("Location: https://abizeitung.rubidium.ml/profile.php");