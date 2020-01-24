<?php
include "Templates/login.inc.php";
?>
<?php
	$title = "Kommentare - Mein Steckbrief";
	include "Templates/header.inc.php";
?>
	<div id="main">
<?php
	echo '<h1>Kommentare zum Steckbrief von ' . $arr['username'] . '</h1>';

	$ps = $mysqli->prepare("SELECT * FROM comments where userid = ?");
	$ps->bind_param("s", $user);
	$ps->execute();
	$result = $ps->get_result();


	if(mysqli_num_rows($result) > 0){
		echo '<p>Um einen Kommentar zu löschen, klick ihn an und bestätige danach am Ende der Seite.</p>';
		while ($row = $result->fetch_assoc()) {
			if( array_key_exists("comment_id", $_GET) && $row['id'] == $_GET['comment_id']){
				echo '<b>';
			}
			echo '<a href="?comment_id=' . $row["id"] . '"><em>ID ' . $row["id"] . ':</em> ' .  $row["comment"] . '</a>';
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
			echo '<em>"' . $comment_cache . '"</em><br>';
			echo    '<form action="remove_comment.php" method="post">
				Sicher, dass du diesen Kommentar endgültig löschen möchtest?
				<input name="comment_id" hidden="true" value="'. $_GET['comment_id'] . '">
				<input name="src" hidden="true" value="my_comments.php">
				<input type="submit" value="Löschen">
			</form>';
		}
	}else{
		echo '<br><em>Es wurden noch keine Kommentare zu deinem Steckbrief abgegeben.</em></br>';
	}
	?>

</div>


<?php 
	include('Templates/navigation.inc.php');  
	include('Templates/footer.inc.php'); 
?>
