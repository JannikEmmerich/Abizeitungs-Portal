			<div id="navigation">
<?php 	$parent = substr($_SERVER["SCRIPT_NAME"],1);
	$array = array(
		"index.php" => "Hauptseite",
		"profile.php" => "Steckbrief bearbeiten",
		"my_comments.php" => "Kommentare zu meinem Steckbrief",
		"upload.php" => "Bilder hochladen",
		"comment.php" => "Steckbriefe kommentieren",
		"surveys.php" => "Umfragen",
		"citation.php" => 'Zitate und "Stimmt es, dass...?"',
		"all_citations.php" => "Alle Zitate anzeigen",
		"students.php" => "Alle Schüler anzeigen",
		"teachers.php" => "Alle Lehrer anzeigen",
		);
	foreach($array as $key => $value){
		if($key == $parent){
			echo '					<div id="element"><a href="' . $key . '"><em>' . $value . '</em></a></div>' . "\n";
		}else{
			echo '					<a href="' . $key . '"><div id="element">' . $value . '</div></a>' . "\n";
		}
	}
?>
			</div>
