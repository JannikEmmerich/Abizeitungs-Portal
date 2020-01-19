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

$ps = $mysqli->prepare("SELECT * FROM profiles where userid = ?");
$ps->bind_param("s", $user);
$ps->execute();
$result = $ps->get_result();

$birthdate = "";
$livingplace = "";
$question1 = "";
$question2 = "";
$question3 = "";
$question4 = "";
$question5 = "";

if(mysqli_num_fields($result) > 0) {
    $arr = $result->fetch_assoc();

    $birthdate = $arr["birthdate"];
    $livingplace = $arr["livingplace"];
    $question1 = $arr["question1"];
    $question2 = $arr["question2"];
    $question3 = $arr["question3"];
    $question4 = $arr["question4"];
    $question5 = $arr["question5"];
}

?>

<p>Aktuelles Bild: <br><img alt="Du hast noch kein Bild hochgeladen!" src='data:image/png;base64,<?php echo base64_encode(file_get_contents("Images/" . $user . "_current.png")); ?>'></p>
<p>Altes Bild: <br><img alt="Du hast noch kein Bild hochgeladen!" src='data:image/png;base64,<?php echo base64_encode(file_get_contents("Images/" . $user . "_old.png")); ?>'></p>

<form action="save_profile.php" method="post">
    Geburtsdatum:
    <input name="birthdate" type="date" value="<?php echo $birthdate?>">
    <br>
    <br>
    Wohnort:
    <input name="livingplace" type="text" value="<?php echo $livingplace?>">
    <br>
    <br>
    Mein persönlicher Boom:
    <br>
    <textarea name="question1" cols="35" rows="5"><?php echo $question1?></textarea>
    <br>
    <br>
    In den "Goldenen Zwanzigern" möchte ich...:
    <br>
    <textarea name="question2" cols="35" rows="5"><?php echo $question2?></textarea>
    <br>
    <br>
    Dieser Lehrer / diese Lehrerin verdient einen Gehaltsboom:
    <input name="question3" type="text" value="<?php echo $question3?>">
    <br>
    <br>
    Dieses Fach bewahrte mich vor der Krise:
    <input name="question4" type="text" value="<?php echo $question4?>">
    <br>
    <br>
    Meine Devise für die Krise:
    <br>
    <textarea name="question5" cols="35" rows="5"><?php echo $question5?></textarea>
    <br>
    <br>
    <input type="submit">
</form>

<br>

<a href="index.php">Zurück zum Hauptmenü</a>

</body>

</html>