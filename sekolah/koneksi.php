<?php

$host = "localhost";
$username = "root";
$password = "";
$db = "db_sekolah";

$koneksi = mysqli_connect($host, $username, $password, $db);

//Check Connection
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal :". mysqli_connect_error();
}

?>