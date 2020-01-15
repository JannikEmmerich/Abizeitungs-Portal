<?php
include "Templates/login.inc.php";
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Abizeitung - Kommentieren</title>
</head>

<body>

<form>
    Bitte gib den Namen der Person, dessen Steckbrief Du kommentieren möchtest, ein:
    <input name="name" type="text">
    <input type="submit">
</form>

<?php
    if (array_key_exists("name", $_GET)) {
        $ps = $mysqli->prepare("SELECT userid, question1, question2 FROM users, profiles WHERE userid = id AND username = ? ");
        $ps->bind_param("s", $_GET['name']);
        $ps->execute();
        $result = $ps->get_result();

        if (mysqli_num_fields($result) == 0) {
            echo "Der Steckbrief von " . $_GET['name'] . " wurde nicht gefunden!";
        } else {
            $arr = $result->fetch_assoc();
            echo "<h1>Steckbrief von " . $_GET['name'] . "</h1>";
            echo "<p>Question1: " . $arr["question1"] . "</p>";
            echo "<p>Question1: " . $arr["question2"] . "</p>";

            echo    '<br><form action="save_comment.php" method="post">
                        Kommentar abgeben: 
                        <input name="comment" type="text">
                        <input name="name" hidden="true" value=' . $_GET['name'] . '>
                        <input type="submit">
                    </form>';

            $ps = $mysqli->prepare("SELECT comment from comments where userid = ?");
            $ps->bind_param("s", $arr['userid']);
            $ps->execute();
            $result = $ps->get_result();

            if (mysqli_num_fields($result) > 0) {
                echo "<br><h2>Kommentare:</h2>";

                while ($row = $result->fetch_assoc()) {
                    echo "<p>" .  $row["comment"] . "</p>";
                }
            }
        }
    }
?>

<br>

<a href="index.php">Zurück zum Hauptmenü</a>

</body>

</html>