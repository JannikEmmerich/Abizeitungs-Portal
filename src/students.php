<?php
include "Templates/login.inc.php";
?>
<?php
	$title = "Alle Schüler";
	include "Templates/header.inc.php";
?>
			<div id="main">
				<h2>Alle Schüler:</h2>
				<ul style="list-style-type: none;">
<?php
	$ps = $mysqli->prepare("SELECT * FROM users ORDER BY 2 ASC");
	$ps->execute();
	$result = $ps->get_result();

	while ($row = $result->fetch_assoc()) {
	echo '					<li><a href="comment.php?name=' . $row["username"] . '">' . $row['username'] . '</a></li>' . "\n";
	}
?>
</ul>
			</div>
<?php
	include('Templates/navigation.inc.php');
	include('Templates/footer.inc.php');
?>
