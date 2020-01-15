<?php

$mysqli->query('CREATE TABLE IF NOT EXISTS users (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY UNIQUE,
	username VARCHAR(100),
	password VARCHAR(64)
	)');
$mysqli->query('CREATE TABLE IF NOT EXISTS comments (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY UNIQUE,
	userid INT, 
	author INT, 
	comment TEXT
	)');
$mysqli->query('CREATE TABLE IF NOT EXISTS profiles (
	userid INT PRIMARY KEY UNIQUE,
	question1 TEXT, 
	question2 TEXT
	)');
