<?php
include "Templates/login.inc.php";
?>
<?php
	$title = "Kommentieren";
	include "Templates/header.inc.php";
?>
<div id="main">

	<h1>Neuen Kommentar verfassen</h1>
	<form>
		<em>Bitte gib den Namen der Person, deren Steckbrief Du kommentieren möchtest, ein:</em>
		<input name="name" type="text">
		<input type="submit">
	</form>
	<div id="display">
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
		} else {
			$arr = $result->fetch_assoc();

			$question1 = $arr["question1"];
			$question2 = $arr["question2"];
			$question3 = $arr["question3"];
			$question4 = $arr["question4"];
			$question5 = $arr["question5"];

			echo "<h3>Steckbrief von " . $_GET['name'] . "</h3>";
			echo "<p>Mein persönlicher Boom: " . $arr["question1"] . "</p>";
			echo "<p>In den \"Goldenen Zwanzigern\" möchte ich...: " . $arr["question2"] . "</p>";
			echo "<p>Dieser Lehrer / diese Lehrerin verdient einen Gehaltsboom: " . $arr["question3"] . "</p>";
			echo "<p>Dieses Fach bewahrte mich vor der Krise: " . $arr["question4"] . "</p>";
			echo "<p>Meine Devise für die Krise: " . $arr["question5"] . "</p>";
		}
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
			echo "<br><h4>Kommentare:</h4>";

			while ($row = $result->fetch_assoc()) {
				echo "<p>" .  $row["comment"] . "</p>";
			}
		}
		
		}
	}
	?>
	</div>
	<?php
	$ps = $mysqli->prepare("SELECT u.username, c.id, c.comment, c.userid, c.author FROM comments c, users u WHERE c.author = ? AND c.userid = u.id");
	$ps->bind_param("i", $user);
	$ps->execute();
	$result = $ps->get_result();
	
	if(mysqli_num_fields($result) > 0){
		echo '<br><hr style="border: 2px solid darkgrey">';
		echo '<p><h1>Du hast bereits folgende Kommentare abgegeben: </h1> 
		Um einen Kommentar zu ändern, klick ihn an, du kannst ihn dann am Ende der Seite bearbeiten oder löschen.</p>';
		while ($row = $result->fetch_assoc()) {
			if( array_key_exists("comment_id", $_GET) && $row['id'] == $_GET['comment_id']){
				echo '<b>';
			}
			echo '<a href="?comment_id=' . $row["id"] . '"><em>ID ' . $row["id"] . ':</em> "' .  $row["comment"] . '" zum Steckbrief von ' . $row["username"] . '</a>';
			if( array_key_exists("comment_id", $_GET) && $row['id'] == $_GET['comment_id']){
				echo '</b>';
			}
			echo '<br>';
			if($row['id'] == $_GET["comment_id"]){
				$comment_cache = $row["comment"];
			}
		}
		if (array_key_exists("comment_id", $_GET)) {
			echo '<br><br><hr style="border: 2px solid lightgrey">';
			echo    '<form action="update_comment.php" method="post">
				Kommentar ändern
				<input name="comment" type="text" size="55" value="'. $comment_cache . '">
				<input name="comment_id" hidden="true" value="'. $_GET['comment_id'] . '">
				<input name="name" hidden="true" value="'. $_GET['name'] . '">
				<input type="submit">
			</form>';
			echo '<hr style="border: 1px solid lightgrey">';
			echo    '<form action="remove_comment.php" method="post">
				Diesen Kommentar löschen (endgültig!)
				<input name="comment_id" hidden="true" value="'. $_GET['comment_id'] . '">
				<input name="src" hidden="true" value="comment.php">
				<input name="name" hidden="true" value="'. $_GET['name'] . '">
				<input type="submit" value="Löschen">
			</form>';
		}
	}
	?>
</div>
	
<?php 
	include('Templates/navigation.inc.php');  
	include('Templates/footer.inc.php'); 
?>
