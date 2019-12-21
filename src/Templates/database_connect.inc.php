<?php

    if (!file_exists('/tmp/initiated')) {
        include 'init.php';
        fopen('/tmp/initiated', 'w');
    }

	$pdo = new PDO('mysql:host=db;dbname=abizeitung', 'abizeitung', 'abizeitung');
?>
