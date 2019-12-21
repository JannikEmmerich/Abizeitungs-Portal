<?php

$pdo = new PDO('mysql:host=db;dbname=abizeitung', 'abizeitung', 'abizeitung');

$pdo->query('CREATE TABLE IF NOT EXISTS USERS(
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY UNIQUE,
	name VARCHAR(100),
	password VARCHAR(64)
	)');
$pdo->query('CREATE TABLE IF NOT EXISTS COMMENTS(
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY UNIQUE,
	user INT, 
	author INT, 
	comment TEXT
	)');
$pdo->query('CREATE TABLE IF NOT EXISTS PROFILES(
	user INT PRIMARY KEY UNIQUE,
	QUESTION1 TEXT, 
	QUESTION2 TEXT
	)');
