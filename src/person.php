<?php 	$title = 'AbizeitungsPortal - Steckbrief';
	include('Templates/header.inc.php'); ?>
	

	<div id="main">
		<h2>Steckbrief</h2>
		<?php
			$statement = $pdo->prepare("SELECT answer1, answer2 FROM person WHERE SNr = 1");
			$statement->execute();
			$n = $statement->fetch();
			
			if ( isset($n["answer1"]) ){
				$frage1 = $n["answer1"];
			} else {
				$frage1 = '';
			}
			if ( isset($n["answer2"]) ){
				$frage2 = $n["answer2"];
			} else {
				$frage2 = '';
			}
		?>
		<p>
			Hier könnt ihr euren persönlichen Steckbrief ausfüllen. <br/>
			Ihr könnt ihn bis zum Redaktionsschluss am XX.XX. ändern.
		</p>
		<form method="POST" action="./save_data.php">
			<b>Frage 1?</b> <br/>
			<textarea type="text" maxlength="500" placeholder="Antwort" name="frage1" size="150" style="height: 100px; width: 100%"><?php echo $frage1; ?></textarea> <br/> <br/>
			<b>Frage 2?</b> <br/>
			<textarea type="text" maxlength="500" placeholder="Antwort" name="frage2" size="150" style="height: 100px; width: 100%"><?php echo $frage2; ?></textarea> <br/> <br/>
			<button type="submit">Absenden</button>
			<input type="hidden" name="type" value="steckbrief"/>
		</form>
	</div>
	
	<?php include('Templates/navigation.inc.php'); ?>

<?php include('Templates/footer.inc.php'); ?>
