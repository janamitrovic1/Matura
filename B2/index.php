<!DOCTYPE html>
<html lang="sr-RS">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/globals.css">
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/pocetna.css">
    <title>Домаће животиње</title>
</head>
<body>
    <?php
        $url = "index";
        $naslov = "Домаће животиње";
        require_once("./components/header.php");
    ?>
    <div class="main_container">
        <div class="small_container">
            <div class="small_image">
                <img src="./images/krava.jpg" class=" " alt="krava">
            </div>
            <div class="small_image">
                <img src="./images/macka.jpg" class=" " alt="pace">
            </div>
            <div class="small_image">
                <img src="./images/pace.jpg" class=" " alt="pace">
            </div>
            <div class="small_image">
                <img src="./images/pile.jpg" class=" " alt="pile">
            </div>
            <div class="small_image">
                <img src="./images/pas.jpg" class=" " alt="pas">
            </div>
        </div>
    </div>
    <?php
        require_once("./components/footer.php");
    ?>
</body>
</html>