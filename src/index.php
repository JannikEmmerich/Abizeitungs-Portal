<?php 	$title = 'Index';
	include('Templates/header.inc.php'); ?>
	
	<div id="login">
		<h1>Willkommen auf dem AbizeitungsPortal!</h1>
		<p>
			Bitte meldet euch an, um fortzufaren:
		</p>
		<form method="POST" action="./login.php">
			Eure Schüler-ID:
			<input type="number" name="username">
			Euer Passwort:
			<input type="password" name="password">
			<button type="submit">Login</button>
		</form>
	</div>

<?php include('Templates/footer.inc.php'); ?>
