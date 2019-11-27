<?php 	$title = 'AbizeitungsPortal - Speichere Daten';
	include('Templates/redirect.inc.php'); ?>
	
	<?php
		$statement = $pdo->prepare("UPDATE person SET answer1=?, answer2=? WHERE SNr = 1");
		$statement->execute(array($_POST['frage1'], $_POST['frage2']));
	?>

	</body>
</html>
