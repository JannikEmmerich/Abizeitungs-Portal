<?php
    include "Templates/login.inc.php";
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Abizeitung - Hauptmenü</title>
</head>

<body>
<?php
    echo '<h1>Willkommen, ' . $arr['username'] . '!</h1>';
?>

<a href="profile.php">Steckbrief bearbeiten</a>
<br>
<a href="upload.php">Bilder hochladen</a>
<br>
<a href="comment.php">Steckbrief kommentieren</a>
<br>
<a href="surveys.php">Umfragen</a>
<br>
<a href="students.php">Alle Schüler anzeigen</a>

</body>

</html>