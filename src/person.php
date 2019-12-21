<?php 	$title = 'Steckbrief';
	include('Templates/header.inc.php'); ?>
	
		<?php 
			if (isset($_GET['id'])){
				$id=$_GET['id'];
			}else{
				die('Keine Benutzer-ID!');
			}
		?>
			<div id="main">
				<h2>Steckbrief</h2>
				<?php
					$statement = $pdo->prepare("SELECT QUESTION1, QUESTION2 FROM PROFILES WHERE user = ?");
					$statement->execute(array($id));
					$n = $statement->fetch();
					
					if ( isset($n["QUESTION1"]) ){
						$frage1 = $n["QUESTION1"];
					} else {
						$frage1 = '';
					}
					if ( isset($n["QUESTION2"]) ){
						$frage2 = $n["QUESTION2"];
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
					<input type="hidden" name="creator" value="<?php echo $id ?>"/>
				</form>
			</div>
	
	<?php include('Templates/navigation.inc.php'); ?>

<?php include('Templates/footer.inc.php'); ?>
