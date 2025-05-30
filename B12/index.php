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
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
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
        require("database/connection.php");    
        // require_once("components/footer.php");
    ?>
    <?php
        if($_SERVER["REQUEST_METHOD"]=="POST"){
        $ime = test_input($_POST["ime"]);

        $mejl = test_input($_POST["mail"]);
        $nizicsedista = test_input($_POST["sedista"]);

        $nizicsedista = explode(", ",$nizicsedista);
        var_dump($nizicsedista);
        }

                
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>
    <script>
        const rezervisanaSedista = <?php echo json_encode($rezervisana); ?>;
    </script>
    <script src="js/script.js"></script>
</body>
</html>