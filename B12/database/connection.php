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
    echo "<p>connected to base</p>";
}

$sql="SELECT brojsedista from rezervacije WHERE rezervacija=1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p>" . $row["brojsedista"] . "</p>";
    }
} else {
    echo "<p>nista</p>";
}

?>