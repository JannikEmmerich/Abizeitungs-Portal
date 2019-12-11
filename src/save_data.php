<?php 	$title = 'Speichere Daten';
	include('Templates/redirect.inc.php'); ?>
	
	<?php
		if( isset($_POST['type']) ){
			if ($_POST['type'] == 'steckbrief'){
				$statement = $pdo->prepare("UPDATE person SET answer1=?, answer2=? WHERE SNr = 1");
				$statement->execute(array($_POST['frage1'], $_POST['frage2']));
			} else if ($_POST['type'] == 'comment'){
				$statement = $pdo->prepare("INSERT INTO comment VALUES (?,?,?)");
				$statement->execute(array($_POST['student_id'],$_POST['comment'],$_POST['creator']));
			}
		} else {
			die("Nicht genug Angaben übergeben!");
		}
	?>

	</body>
</html>
