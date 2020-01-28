<?php

    $mysqli = mysqli_connect('172.18.0.2', 'abizeitung','abizeitung','abizeitung');

    mysqli_set_charset($mysqli, "utf8");

    if (!file_exists('/tmp/initiated')) {
        include 'Templates/init.inc.php';
        fopen('/tmp/initiated', 'w');
    }
