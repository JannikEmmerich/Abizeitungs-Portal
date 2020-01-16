<?php

    $mysqli = mysqli_connect('172.19.0.6', 'abizeitung','abizeitung','abizeitung');

    if (!file_exists('/tmp/initiated')) {
        include 'Templates/init.inc.php';
        fopen('/tmp/initiated', 'w');
    }