<?php
$Hostname = 'localhost';
$User     = 'Abdul';
$Password = '1612';
$Database = 'cv';

$connection = mysqli_connect($Hostname, $User, $Password, $Database);
if (!$connection) {
    die("maaf anda gagal terhubung") . mysqli_connect();
}
