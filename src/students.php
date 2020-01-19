<?php
include "Templates/login.inc.php";
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Abizeitung - Umfragen</title>
</head>

<body>

<p>Alle Schüler:</p>

<?php
$ps = $mysqli->prepare("SELECT * FROM users");
$ps->execute();
$result = $ps->get_result();

while ($row = $result->fetch_assoc()) {
    echo $row['username'];
    echo "<br>";
}
?>

<br>

<a href="index.php">Zurück zum Hauptmenü</a>

</body>

</html>