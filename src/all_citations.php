<?php
include "Templates/login.inc.php";
?>
<?php
	$title = "Zitate";
	include "Templates/header.inc.php";
?>

<div id="main">

	<h3>Hier sind alle bereits abgegebene Zitate:</h3>
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
		}
		echo '<b> - Schülerzitate - </b><br>' . "\n";
		$ps = $mysqli->prepare("SELECT sc.id, sc.citation, u.username FROM student_citations sc, users u WHERE sc.userid=u.id");
		$ps->execute();
		$result = $ps->get_result();
		while($row=$result->fetch_assoc()){
			echo $row["username"] . ': "' . $row["citation"] . '"<br>' . "\n";
		}
		echo '<b> - Lehrerzitate - </b><br>' . "\n";
		$ps = $mysqli->prepare("SELECT tc.id, tc.citation, t.username FROM teacher_citations tc, teachers t WHERE tc.userid=t.id");
		$ps->execute();
		$result = $ps->get_result();
		while($row=$result->fetch_assoc()){
			echo $row["username"] . ': "' . $row["citation"] . '"<br>' . "\n";
		}
		echo '<b> - Stimmt es, dass ... - </b><br>' . "\n";
		$ps = $mysqli->prepare("SELECT text FROM trueornot");
		$ps->execute();
		$result = $ps->get_result();
		while($row=$result->fetch_assoc()){
			echo 'Stimmt es, dass <i>' . $row["text"] . '</i>?<br>' . "\n";
		}
	
	?>
</div>
	
<?php 
	include('Templates/navigation.inc.php');  
	include('Templates/footer.inc.php'); 
?>
