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
    <?php
        require_once("./components/nav.php");
    ?>

    <main>
        <form class="form" method="POST" action="./obrada.php">
            <div class="form-row" >
                <label for="ime">IME:</label>
                <input type="text" id="ime" name="ime" required>
            </div>
            <div class="form-row">
                <label for="email">EMAIL:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-row">
                <label for="komentar">KOMENTAR:</label>
                <textarea id="komentar" name="komentar" rows="5" required></textarea>
            </div>
            <div class="form-row">
                <label></label>
                <button type="submit">Dodaj komentar</button>
            </div>
        </form>
    </main>

    <?php
        require_once("./components/footer.php");
    ?>
</section>
</body>
</html>