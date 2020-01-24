<?php
include "Templates/login.inc.php";
?>
<?php
$title = "Alle Lehrer";
include "Templates/header.inc.php";
?>
<div id="main">
    <h2>Alle Lehrer:</h2>
    <ol>
        <?php
        $ps = $mysqli->prepare("SELECT * FROM teachers");
        $ps->execute();
        $result = $ps->get_result();

        while ($row = $result->fetch_assoc()) {
            echo '					<li>' . $row['username'] . '</li>' . "\n";
        }
        ?>
    </ol>
</div>
<?php
include('Templates/navigation.inc.php');
include('Templates/footer.inc.php');
?>
