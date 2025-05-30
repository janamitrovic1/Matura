<?php
require_once("./database/konekcija.php");

$ime = '';
$email = '';
$komentar = '';
$poruka = '';
$porukaBoja = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ime = trim($_POST['ime'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $komentar = trim($_POST['komentar'] ?? '');
    $datum = date('Y-m-d H:i:s');

    if ($ime === '' || $email === '' || $komentar === '') {
        $poruka = "Sva polja su obavezna.";
        $porukaBoja = "red";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $poruka = "Neispravna email adresa.";
        $porukaBoja = "red";
    } else {
        $sql = "INSERT INTO Utisak (Ime, Email, Komentar, Datum) VALUES ('$ime', '$email', '$komentar', '$datum')";
        if (mysqli_query($conn, $sql)) {
            $ime = '';
            $email = '';
            $komentar = '';
        } else {
            $poruka = "Greška prilikom unosa: " . mysqli_error($conn);
            $porukaBoja = "red";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="sr-RS">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/globals.css">
    <link rel="stylesheet" href="./css/pocetna.css">
    <title>Књига утисака</title>
</head>
<body>
    <?php require_once("./components/nav.php"); ?>

    <main>
        <?php if ($poruka): ?>
            <p style="color:<?= $porukaBoja ?>;"><?= $poruka ?></p>
        <?php endif; ?>
        <form class="form" method="POST" action="">
            <div class="form-row">
                <label for="ime">IME:</label>
                <input type="text" id="ime" name="ime" value="<?= htmlspecialchars($ime) ?>" required>
            </div>
            <div class="form-row">
                <label for="email">EMAIL:</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>" required>
            </div>
            <div class="form-row">
                <label for="komentar">KOMENTAR:</label>
                <textarea id="komentar" name="komentar" rows="5" required><?= htmlspecialchars($komentar) ?></textarea>
            </div>
            <div class="form-row">
                <label></label>
                <button type="submit">Dodaj komentar</button>
            </div>
        </form>
    </main>

    <?php require_once("./components/footer.php"); ?>
</body>
</html>
