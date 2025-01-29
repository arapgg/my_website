<?php

$hostname = 'localhost';
$username = 'root';
$password = '';
$database_name = 'the_name';

$db = mysqli_connect($hostname, $username, $password, $database_name);

if($db->connect_error) {
    echo "Koneksi Tidak Berhasil/Eror";
    die('eror !');
}

?>