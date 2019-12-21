<?php 	$title = 'Speichere Daten';
	include('Templates/redirect.inc.php'); ?>
	
	<?php
		if( isset($_POST['type']) ){
			if ($_POST['type'] == 'steckbrief'){
				$statement = $pdo->prepare('UPDATE PROFILES SET QUESTION1=?, QUESTION2=? WHERE user=?');
				$statement->execute(array($_POST['frage1'], $_POST['frage2'], $creator)); 
				if(!($statement->rowCount() > 0)){
					$statement = $pdo->prepare("INSERT INTO PROFILES (user, QUESTION1, QUESTION2) VALUES (?,?,?)");
					$statement->execute(array($creator, $_POST['frage1'], $_POST['frage2']));
				}
			} else if ($_POST['type'] == 'comment'){
				if(isset($_POST['student_id'])){
					$id=str_split($_POST['student_id'])[1];
				} else { 
					die('Student ID is not set!');
				}
				$statement = $pdo->prepare("INSERT INTO COMMENTS (user, author, comment) VALUES (?,?,?)");
				$statement->execute(array($id, $creator, $_POST['comment']));
			}
		} else {
			die("Save type not specified!");
		}
	?>

	</body>
</html>
