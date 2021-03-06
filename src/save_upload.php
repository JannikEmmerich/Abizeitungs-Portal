<?php
include "Templates/login.inc.php";

$upload_folder = 'Images/'; //Das Upload-Verzeichnis

if (array_key_exists('current', $_FILES)) {
    $state = "current";
} else {
    $state = "old";
}
$filename = $user . '_' . $state;
$extension = strtolower(pathinfo($_FILES[$state]['name'], PATHINFO_EXTENSION));


//Überprüfung der Dateiendung
$allowed_extensions = array('png', 'jpg', 'jpeg');
if(!in_array($extension, $allowed_extensions)) {
    die("Ungültige Dateiendung. Nur png, jpg und jpeg Dateien sind erlaubt");
}

//Überprüfung der Dateigröße
$max_size = 1024*1024*10; //500 KB
if($_FILES[$state]['size'] > $max_size) {
    die("Bitte keine Dateien größer 10MB hochladen");
}

//Überprüfung dass das Bild keine Fehler enthält
if(function_exists('exif_imagetype')) { //Die exif_imagetype-Funktion erfordert die exif-Erweiterung auf dem Server
    $allowed_types = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
    $detected_type = exif_imagetype($_FILES[$state]['tmp_name']);
    if(!in_array($detected_type, $allowed_types)) {
        die("Nur der Upload von Bilddateien ist gestattet");
    }
}

//Pfad zum Upload
$new_path = $upload_folder.$filename.'.';


//Neuer Dateiname falls die Datei bereits existiert
if(file_exists($new_path.'png')) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
   unlink($new_path.'png');
}

move_uploaded_file($_FILES[$state]['tmp_name'], $new_path.$extension);

if ($extension == "png") {
    header("Location: https://abizeitung.rubidium.ml/upload.php");
} else {
    $im = imagecreatefromjpeg($new_path.$extension);

    unlink($new_path.$extension);

    $new_path = $upload_folder . $filename . '.png';

    imagepng($im, $new_path);

    header("Location: https://abizeitung.rubidium.ml/upload.php");
}
