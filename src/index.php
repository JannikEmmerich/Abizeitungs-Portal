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
<a href="comment.php">Steckbrief kommentieren</a>

</body>

</html>