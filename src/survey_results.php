<?php
include "Templates/login.inc.php";
?>
<?php
$title = "Umfragen - Ergebnisse";
include "Templates/header.inc.php";
?>

<div id="main">
    <?php
     if (!array_key_exists("survey_key", $_GET)) {
         echo '<div class="error">';
         echo '<p>Die eingegebene Umfrage existiert nicht!</p>';
         echo '</div>';
     } else {
         $survey = $_GET["survey_key"];

         $ps = $mysqli->prepare("SELECT survey_value, count(*) as number FROM surveys WHERE survey_key = ? GROUP BY survey_value ORDER BY number DESC ");
         $ps->bind_param("s", $survey);
         $ps->execute();
         $result = $ps->get_result();

         if (mysqli_num_rows($result) == 0) {
             echo '<div class="error">';
             echo '<p>Die eingegebene Umfrage hat noch keine Einträge oder existiert nicht!</p>';
             echo '</div>';
         } else {
             echo "<p>Ergebnisse zu " . $survey . ":</p>";
             echo "<table>";
             while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["survey_value"] . "</td>";
                 echo "<td>" . $row["number"] . "</td>";
                echo "</tr>";
             }
             echo "</table>";
         }
     }
    ?>

    <br>
    <a href="surveys.php">Zurück zu den Umfragen</a>

</div>

<?php
include('Templates/navigation.inc.php');
include('Templates/footer.inc.php');
?>
