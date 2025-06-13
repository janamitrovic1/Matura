<?php
$server="localhost";
$username="root";
$password="";
$database = "matura_b12";

$conn = new mysqli($server,$username,$password,$database);

if($conn->connect_error){
    die("connection failed:".$conn->connect_error);
}
else
{
    // echo "<p>connected to base</p>";
}


$sql = "SELECT COUNT(*) as broj from rezervacije";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if($row["broj"]==0){
    $values = [];
    for($i = 2;$i<53;$i++){
        $values[] = "($i,b'0')";
    }
    $sql = "INSERT INTO rezervacije(Broj_sedista,Rezervacija) VALUES ".implode(", ",$values);
    // $result = $conn->query($sql);
    if($conn->query($sql)){
        // echo "<p>uneti redovici</p>";
    }
    else
        echo "<p>erorr</p>";
}
else
// echo "<p>uneti redovi</p>";




?>