<?php
$host = 'localhost';
$port = '1521';
$pass = '365289';
$user = 'mikael';
$dbname = 'xe';

$conn = oci_connect($user, $pass, "//{$host}:{$port}/{$dbname}");

if (!$conn) {
    $e = oci_error();
    echo "Koneksi gagal: " . $e['message'];
} else {
    echo "Koneksi berhasil!";
}
?>