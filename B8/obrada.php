<?php
$host = '127.0.0.1';
$db   = 'matura_b8';  
$user = 'root';
$pass = '';         
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    echo "Konekcija uspešna!";
} catch (PDOException $e) {
    echo "Greška: " . $e->getMessage();
}


$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    die("Greška pri povezivanju sa bazom: " . $e->getMessage());
}


$ime = trim($_POST['ime'] ?? '');
$email = trim($_POST['email'] ?? '');
$komentar = trim($_POST['komentar'] ?? '');

$greske = [];

if ($ime === '' || $email === '' || $komentar === '') {
    $greske[] = "Sva polja su obavezna.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $greske[] = "Neispravna email adresa.";
}

if (count($greske) > 0) {
    foreach ($greske as $greska) {
        echo "<p style='color:red;'>$greska</p>";
    }
    echo "<p><a href='pocetna.php'>Vrati se nazad</a></p>";
    exit;
}

// 3. Upis u bazu
$datum = date('Y-m-d H:i:s');

$sql = "INSERT INTO Utisak (Ime, Email, Komentar, Datum) VALUES (?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$ime, $email, $komentar, $datum]);

echo "<p style='color:green;'>Uspešno ste dodali komentar!</p>";
echo "<p><a href='index.php'>Nazad</a></p>";
?>
