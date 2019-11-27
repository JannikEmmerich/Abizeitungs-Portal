<?php 	$title = 'AbizeitungsPortal - Steckbrief';
	include('Templates/header.inc.php'); ?>
	

	<div id="main">
		<h2>Kommentare</h2>
		<?php
			$statement = $pdo->prepare("SELECT SNr, name FROM person");
			$statement->execute();
		?>
		<p>
			Hier könnt ihr Kommentare abgeben, die in der Abizeitung unter den Steckbriefen der anderen erscheinen. <br/>
			Pro Person könnt ihr einen Kommentar abgeben.
		</p>
		<form method="GET" action="./save_data.php">
			<label>Schüler*in: <br/>
				<select name="student_id">
					<?php
						while($value = $statement->fetch() ){
							echo '<option>';
							echo '(' . $value['SNr'] . ') ' . $value['name'];
							echo '</option>';
						}
					?>
				</select>
			</label><br/>
			Dein Kommentar: <br/>
			<textarea maxlength="100" placeholder="Kommentar" name="comment" style="height: 50px; width: 100%"></textarea>
			<button type="submit">Absenden</button>
			<input type="hidden" name="type" value="comment"/>
		</form>
	</div>
	
	<?php include('Templates/navigation.inc.php'); ?>
	

<?php include('Templates/footer.inc.php'); ?>
