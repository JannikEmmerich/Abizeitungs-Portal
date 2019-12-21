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
				<h2>Kommentare</h2>
				<?php
					$statement = $pdo->prepare("SELECT id, name FROM USERS");
					$statement->execute();
				?>
				<p>
					Hier könnt ihr Kommentare abgeben, die in der Abizeitung unter den Steckbriefen der anderen erscheinen. <br/>
					Pro Person könnt ihr einen Kommentar abgeben.
				</p>
				<form method="POST" action="./save_data.php">
					<label>Schüler*in: <br/>
						<select name="student_id">
							<?php
								while($value = $statement->fetch() ){
									echo '<option>';
									echo '(' . $value['id'] . ') ' . $value['name'];
									echo '</option>';
								}
							?>
						</select>
					</label><br/>
					Dein Kommentar: <br/>
					<textarea maxlength="100" placeholder="Kommentar" name="comment" style="height: 50px; width: 100%"></textarea>
					<button type="submit">Absenden</button>
					<input type="hidden" name="type" value="comment"/>
					<input type="hidden" name="creator" value="<?php echo $id ?>"/>
				</form>
			</div>
	
	<?php include('Templates/navigation.inc.php'); ?>
	

<?php include('Templates/footer.inc.php'); ?>
