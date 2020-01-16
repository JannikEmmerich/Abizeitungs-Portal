<?php
include "Templates/login.inc.php";
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Abizeitung - Steckbriefe</title>
</head>

<body>

Wenn du bereits ein Bild hochgeladen hast kannst du es durch einen erneuten Upload überschreiben!

<br>
<br>

Aktuelles Bild:
<form action="save_upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="current"><br>
    <input type="submit">
</form>

<br>

Altes Bild:
<form action="save_upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="old"><br>
    <input type="submit">
</form>

</body>

</html>