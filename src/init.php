<?php

$pdo = new PDO('mysql:host=db;dbname=abizeitung', 'abizeitung', 'abizeitung');

$pdo->query('CREATE TABLE IF NOT EXISTS USERS(id INT PRIMARY KEY , name VARCHAR(100), password VARCHAR(64))');
$pdo->query('CREATE TABLE IF NOT EXISTS COMMENTS(id INT PRIMARY KEY , user INT, author INT)');
$pdo->query('CREATE TABLE IF NOT EXISTS PROFILES(user INT PRIMARY KEY , QUESTION1 TEXT, QUESTION2 TEXT)');
