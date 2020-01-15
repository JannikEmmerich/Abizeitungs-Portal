<?php
include "Templates/login.inc.php";

$name = $_POST['name'];
$comment = $_POST['comment'];

$ps = $mysqli->prepare("INSERT INTO comments (userid, author, comment) VALUES((SELECT id FROM users WHERE username = ?), ?, ?)");
$ps->bind_param("sss", $name, $user, $comment);
$ps->execute();

header("Location: https://abizeitung.rubidium.ml/comment.php?name=" . $name);