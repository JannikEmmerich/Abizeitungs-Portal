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
<?php
echo '<h1>Steckbrief von ' . $arr['username'] . '</h1>';

$ps = $mysqli->prepare("SELECT question1, question2 FROM profiles where userid = ?");
$ps->bind_param("s", $user);
$ps->execute();
$result = $ps->get_result();

$question1 = "";
$question2 = "";

if(mysqli_num_fields($result) > 0) {
    $arr = $result->fetch_assoc();

    $question1 = $arr["question1"];
    $question2 = $arr["question2"];
}

?>

<p>Aktuelles Bild: <img alt="Du hast noch kein Bild hochgeladen!" src='data:image/png;base64,<?php echo base64_encode(file_get_contents("Images/" . $user . "_current.png")); ?>'></p>
<p>Altes Bild: <img alt="Du hast noch kein Bild hochgeladen!" src='data:image/png;base64,<?php echo base64_encode(file_get_contents("Images/" . $user . "_old.png")); ?>'></p>

<form action="save_profile.php" method="post">
    Question 1:
    <input name="question1" type="text" value="<?php echo $question1?>">
    <br>
    <br>
    Question 2:
    <input name="question2" type="text" value="<?php echo $question2?>">
    <br>
    <br>
    <input type="submit">
</form>

<br>

<a href="index.php">Zurück zum Hauptmenü</a>

</body>

</html>