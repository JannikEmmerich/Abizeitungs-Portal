<?php
include "Templates/login.inc.php";

$survey = $_POST['survey'];
$value = $_POST['value'];

$ps = $mysqli->prepare("DELETE FROM surveys where userid = ? and survey_key = ?");
$ps->bind_param("ss", $user, $survey);
$ps->execute();

$ps = $mysqli->prepare("INSERT INTO surveys (userid, survey_key, survey_value) VALUES(?, ?, ?)");
$ps->bind_param("sss", $user, $survey, $value);
$ps->execute();

header("Location: https://abizeitung.rubidium.ml/index.php");

