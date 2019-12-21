<?php 	
	include('database_connect.inc.php');
	if(isset($_POST['creator'])){
		$creator=$_POST['creator'];
	} else {
		die('Creator ID is not set!');
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8"> 
		<title><?php echo $title ?></title>
		<meta http-equiv="refresh" content="0; url=person.php?id=<?php echo $creator?>">
	</head>

	<body>
