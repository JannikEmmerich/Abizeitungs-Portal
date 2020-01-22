<?php
    include "Templates/login.inc.php";
?>

<?php
	$title = 'Hauptseite';
	include "Templates/header.inc.php";
?>
<?php
    echo '<h1>Willkommen, ' . $arr['username'] . '!</h1>';
?>
<?php 
	include('Templates/navigation.inc.php');  
	include('Templates/footer.inc.php'); 
?>
