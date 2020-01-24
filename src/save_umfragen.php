<?php
include "Templates/login.inc.php";

$survey = $_POST['survey'];
$value = $_POST['value'];

$type = $_POST['type'];

if ($type == "student") {
    $ps = $mysqli->prepare("SELECT id FROM users where username = ?");
} else if ($type == "teacher") {
    $ps = $mysqli->prepare("SELECT id FROM teachers where username = ?");
} else {
    die ("Error, bitte kontaktiere die Entwickler!");
}

$ps->bind_param("s", $value);
$ps->execute();
$result = $ps->get_result();

if (mysqli_num_rows($result) == 0) {
    header("Location: https://abizeitung.rubidium.ml/surveys.php?invalid_input=1");
} else {
    $ps = $mysqli->prepare("DELETE FROM surveys where userid = ? and survey_key = ?");
    $ps->bind_param("is", $user, $survey);
    $ps->execute();

    $ps = $mysqli->prepare("INSERT INTO surveys (userid, survey_key, survey_value) VALUES(?, ?, ?)");
    $ps->bind_param("iss", $user, $survey, $value);
    $ps->execute();

    header("Location: https://abizeitung.rubidium.ml/survey_results.php?survey_key=" . $survey);
}

