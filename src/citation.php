<?php
include "Templates/login.inc.php";
?>
<?php
	$title = "Zitate";
	include "Templates/header.inc.php";
?>

<div id="main">

	<h3>Hier kannst du Zitate von Schülern oder Lehrern eingeben, wähle dazu einfach die Person aus der Liste aus:</h3>
	<h4>Schüler</h4>
	<form action="save_citation.php" method="post">
		<select name="userid">
			<?php
				$ps = $mysqli->prepare("SELECT * FROM users ORDER BY 2 ASC");
				$ps->execute();
				$result = $ps->get_result();
				
				while($row=$result->fetch_assoc()){
					echo '<option value="' . $row['id'] . '">' . $row['username'] . '</option>';
				}
			?>
		</select>
        <br>
        <br>
        <textarea name="citation" cols="35" rows="5"></textarea>
        <br>
		<input type="hidden" name="type" value="student">
		<input type="hidden" name="act" value="INSERT">
		<input type="submit">
	</form>
	<h4>Lehrer</h4>
	<form action="save_citation.php" method="post">
		<select name="userid">
			<?php
				$ps = $mysqli->prepare("SELECT * FROM teachers ORDER BY 2 ASC");
				$ps->execute();
				$result = $ps->get_result();
				
				while($row=$result->fetch_assoc()){
					echo '<option value="' . $row['id'] . '">' . $row['username'] . '</option>';
				}
			?>
		</select>
        <br>
        <br>
        <textarea name="citation" cols="35" rows="5"></textarea>
        <br>
		<input type="hidden" name="type" value="teacher">
		<input type="hidden" name="act" value="INSERT">
		<input type="submit">
	</form>
	<h4>Stimmt es, dass...?</h4>
	<form action="save_ton.php" method="post">
		Stimmt es, dass <input type="text" name="text" size="100">?
		<input type="hidden" name="act" value="INSERT">
		<input type="submit">
	</form>
	<br>
	<h3>Du hast bereits folgende Zitate eingegeben:</h3>
	<em>Durch anklicken kannst du ein Zitat am Ende der Seite bearbeiten oder löschen</em><br><br>
	<?php
		$edit = 0;
		if (array_key_exists("selected_sc", $_GET)) {
			$edit = 1;
			$use = $_GET["selected_sc"];
			$type = "student";
		}else if (array_key_exists("selected_tc", $_GET)){
			$edit = 1;
			$use = $_GET["selected_tc"];
			$type = "teacher";
		}else if (array_key_exists("selected_ton", $_GET)){
			$edit = 1;
			$use = $_GET["selected_ton"];
			$type = "ton";
		}
		echo '<b> - Schülerzitate - </b><br>';
		$ps = $mysqli->prepare("SELECT sc.id, sc.citation, u.username FROM student_citations sc, users u WHERE author = ? AND sc.userid=u.id");
		$ps->bind_param("i", $user);
		$ps->execute();
		$result = $ps->get_result();
		while($row=$result->fetch_assoc()){
			if( $type == "student" && $use == $row["id"]){
				echo '<b>';
				$citation_cache = $row["citation"];
			}
			echo '<a href="?selected_sc=' . $row["id"] . '">' . $row["username"] . ': "' . $row["citation"] . '"</a><br>' . "\n";
			if( $type == "student" && $use == $row["id"]){
				echo '</b>';
			}
		}
		echo '<b> - Lehrerzitate - </b><br>';
		$ps = $mysqli->prepare("SELECT DISTINCT tc.id, tc.citation, t.username FROM teacher_citations tc, teachers t WHERE author = ? AND tc.userid=t.id");
		$ps->bind_param("i", $user);
		$ps->execute();
		$result = $ps->get_result();
		while($row=$result->fetch_assoc()){
			if( $type == "teacher" && $use == $row["id"]){
				echo '<b>';
				$citation_cache = $row["citation"];
			}
			echo '<a href="?selected_tc=' . $row["id"] . '">' . $row["username"] . ': "' . $row["citation"] . '"</a><br>' . "\n";
			if( $type == "teacher" && $use == $row["id"]){
				echo '</b>';
			}
		}
		echo '<b> - Stimmt es, dass ... - </b><br>' . "\n";
		$ps = $mysqli->prepare("SELECT id, text FROM trueornot WHERE author = ?");
		$ps->bind_param("i", $user);
		$ps->execute();
		$result = $ps->get_result();
		while($row=$result->fetch_assoc()){
			if( $type == "ton" && $use == $row["id"]){
				echo '<b>';
				$text_cache = $row["text"];
			}
			echo '<a href="?selected_ton=' . $row["id"] . '">Stimmt es, dass <i>' . $row["text"] . '</i>?</a><br>' . "\n";
			if( $type == "ton" && $use == $row["id"]){
				echo '</b>';
			}
		}
		if($edit == 1){
			if($type == "teacher" || $type=="student"){
				echo '<br><br><hr style="border: 2px solid lightgrey">';
				echo    '<form action="save_citation.php" method="post">
					Zitat ändern
					<input name="citation" type="text" size="55" value="'. $citation_cache . '">
					<input name="citation_id" hidden="true" value="'. $use . '">
					<input type="hidden" name="act" value="UPDATE">
					<input type="hidden" name="type" value="' . $type . '">
					<input type="submit">
				</form>';
				echo '<hr style="border: 1px solid lightgrey">';
				echo    '<form action="save_citation.php" method="post">
					Dieses Zitat löschen (endgültig!)
					<input name="citation_id" hidden="true" value="'. $use . '">
					<input type="hidden" name="act" value="DELETE">
					<input type="hidden" name="type" value="' . $type . '">
					<input type="submit" value="Löschen">
				</form>';
			} else if ($type == "ton"){
				echo '<br><br><hr style="border: 2px solid lightgrey">';
				echo    '<form action="save_ton.php" method="post">
					<b>Ändern:</b>
					Stimmt es, dass <input name="text" type="text" size="55" value="'. $text_cache . '">?
					<input name="ton_id" hidden="true" value="'. $use . '">
					<input type="hidden" name="act" value="UPDATE">
					<input type="hidden" name="type" value="' . $type . '">
					<input type="submit">
				</form>';
				echo '<hr style="border: 1px solid lightgrey">';
				echo    '<form action="save_ton.php" method="post">
					Löschen (endgültig!)
					<input name="ton_id" hidden="true" value="'. $use . '">
					<input type="hidden" name="act" value="DELETE">
					<input type="hidden" name="type" value="' . $type . '">
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
