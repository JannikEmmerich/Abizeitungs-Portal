<?php
    include "Templates/login.inc.php";
?>
<?php
	$title = 'Hauptseite';
	include "Templates/header.inc.php";
?>
<?php

	echo "<div>";
	echo '				<h2>Willkommen, ' . $arr['username'] . '!</h2>' . "\n";

	$array = array(
		"index.php" => "Hauptseite",
		"profile.php" => "Steckbrief bearbeiten",
		"my_comments.php" => "Kommentare zu meinem Steckbrief",
		"upload.php" => "Bilder hochladen",
		"comment.php" => "Steckbriefe kommentieren",
		"surveys.php" => "Umfragen",
		"citation.php" => "Zitate",
		"students.php" => "Alle Schüler anzeigen",
		"teachers.php" => "Alle Lehrer anzeigen",
	);
	foreach ($array as $key => $value) {
		echo '	<a href="' . $key . '">' . $value . '</a><br><br>' . "\n";
	}

	echo "</div>";
?>
<?php 
	include('Templates/navigation.inc.php');  
	include('Templates/footer.inc.php'); 
?>
