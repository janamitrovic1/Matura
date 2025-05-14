<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "matura_b8";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Greška pri povezivanju sa bazom: " . mysqli_connect_error());
}
?>
