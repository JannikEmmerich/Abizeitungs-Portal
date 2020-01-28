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
	birthdate DATE, 
	livingplace TEXT,
	question1 TEXT,
	question2 TEXT,
	question3 TEXT,
	question4 TEXT,
	question5 TEXT
	)');
$mysqli->query('CREATE TABLE IF NOT EXISTS surveys (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY UNIQUE,
	userid INT,
	survey_key TEXT, 
	survey_value TEXT
	)');
$mysqli->query('CREATE TABLE IF NOT EXISTS student_citations (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY UNIQUE,
	userid INT,
	author INT,
	citation TEXT
	)');
$mysqli->query('CREATE TABLE IF NOT EXISTS teacher_citations (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY UNIQUE,
	userid INT,
	author INT,
	citation TEXT
	)');
$mysqli->query('CREATE TABLE IF NOT EXISTS trueornot (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	author INT,
	text TEXT
	)');
