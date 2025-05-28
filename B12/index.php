<!DOCTYPE html>
<html lang="sr-RS">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezervacija autobuskih karata</title>
    <link rel="stylesheet" href="css/globals.css" type="text/css">
    <link rel="stylesheet" href="css/pocetna.css" type="text/css">
</head>
<body>
    <?php
        require_once("components/header.php");
    ?>

    <div class="main">
        <div class="naslov">
            <p>Prikaz sedista autobusa</p>
        </div>
        <div class="sredina">
            <div class="autobus">
            </div>
        </div>
        <div>
            <form action="">
                <div class="grid">
                    <div class="kolona">
                        <label for="sedista">Broj sedista:</label>
                    </div>
                    <div class="kolona">
                        <input name="sedista" id="sedista" type="text">
                    </div>
                    <div class="kolona">
                        <label for="ime">Ime i prezime:</label>
                    </div>
                    <div class="kolona">
                        <input name="ime" id="ime" type="text">
                    </div>
                    <div class="kolona">
                        <label for="mail">E-mail:</label>
                    </div>
                    <div class="kolona">
                        <input name="mail" id="mail" type="email">
                    </div>

                </div>
                <input type="submit" value="Posalji">
            </form>
        </div>
        
    </div>
    <?php 
        require_once("components/footer.php");
    ?>
    <script src="js/script.js"></script>
</body>
</html>