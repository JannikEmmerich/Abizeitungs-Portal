<?php
include "Templates/login.inc.php";
?>
<?php
	$title = "Kommentieren";
	include "Templates/header.inc.php";
?>
<div id="main">

	<form>
		Bitte gib den Namen der Person, dessen Steckbrief Du kommentieren möchtest, ein:
		<input name="name" type="text">
		<input type="submit">
	</form>

	<?php
	<?php
	if (array_key_exists("name", $_GET)) {
		$ps = $mysqli->prepare("SELECT * FROM users WHERE username = ? ");
		$ps->bind_param("s", $_GET['name']);
		$ps->execute();
		$result = $ps->get_result();

		if (mysqli_num_rows($result) == 0) {
		echo "<br>Der Nutzer " . $_GET['name'] . " wurde nicht gefunden!<br>";
		} else {
		$arr = $result->fetch_assoc();
		$userid = $arr['id'];

		$ps = $mysqli->prepare("SELECT * FROM profiles WHERE userid = ? ");
		$ps->bind_param("s", $userid);
		$ps->execute();
		$result = $ps->get_result();

		if (mysqli_num_rows($result) == 0) {
			$arr = $result->fetch_assoc();

			echo "<br>Der Steckbrief von " . $_GET['name'] . " wurde noch nicht erstellt!<br>";

			echo    '<br><form action="save_comment.php" method="post">
				Kommentar abgeben: 
				<input name="comment" type="text">
				<input name="name" hidden="true" value="'. $_GET['name'] . '">
				<input type="submit">
			</form>';

			$ps = $mysqli->prepare("SELECT comment from comments where userid = ?");
			$ps->bind_param("s", $userid);
			$ps->execute();
			$result = $ps->get_result();

			if (mysqli_num_fields($result) > 0) {
			echo "<br><h2>Kommentare:</h2>";

			while ($row = $result->fetch_assoc()) {
				echo "<p>" .  $row["comment"] . "</p>";
			}
			}
		} else {
			$arr = $result->fetch_assoc();

			$question1 = $arr["question1"];
			$question2 = $arr["question2"];
			$question3 = $arr["question3"];
			$question4 = $arr["question4"];
			$question5 = $arr["question5"];

			echo "<h1>Steckbrief von " . $_GET['name'] . "</h1>";
			echo "<p>Mein persönlicher Boom: " . $arr["question1"] . "</p>";
			echo "<p>In den \"Goldenen Zwanzigern\" möchte ich...: " . $arr["question2"] . "</p>";
			echo "<p>Dieser Lehrer / diese Lehrerin verdient einen Gehaltsboom: " . $arr["question3"] . "</p>";
			echo "<p>Dieses Fach bewahrte mich vor der Krise: " . $arr["question4"] . "</p>";
			echo "<p>Meine Devise für die Krise: " . $arr["question5"] . "</p>";

			echo    '<br><form action="save_comment.php" method="post">
				Kommentar abgeben: 
				<input name="comment" type="text">
				<input name="name" hidden="true" value="'. $_GET['name'] . '">
				<input type="submit">
			</form>';

			$ps = $mysqli->prepare("SELECT comment from comments where userid = ?");
			$ps->bind_param("s", $userid);
			$ps->execute();
			$result = $ps->get_result();

			if (mysqli_num_fields($result) > 0) {
			echo "<br><h2>Kommentare:</h2>";

			while ($row = $result->fetch_assoc()) {
				echo "<p>" .  $row["comment"] . "</p>";
			}
			}
		}
		}
	}
	?>
</div>
	
<?php 
	include('Templates/navigation.inc.php');  
	include('Templates/footer.inc.php'); 
?>
