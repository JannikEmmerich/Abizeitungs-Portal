<?php

    $mysqli = mysqli_connect('abizeitung_db', 'abizeitung','abizeitung','abizeitung');

    mysqli_set_charset($mysqli, "utf8");

    if (!file_exists('/tmp/initiated')) {
        include 'Templates/init.inc.php';
        fopen('/tmp/initiated', 'w');
    }
