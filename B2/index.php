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
                <img src="./images/krava.jpg" class="" id="krava" alt="krava">
            </div>
            <div class="small_image">
                <img src="./images/macka.jpg" class="" id="macka" alt="macka">
            </div>
            <div class="small_image">
                <img src="./images/pace.jpg" class=" "  id="patka" alt="patka">
            </div>
            <div class="small_image">
                <img src="./images/pile.jpg" class=" "  id="kokoska" alt="kokoska">
            </div>
            <div class="small_image">
                <img src="./images/pas.jpg" class=" " id="pas" alt="pas">
            </div>
        </div>
        <audio id="audio-krava">
            <source src="./audio/krava.mp3"></source>
        </audio>
        <audio id="audio-macka">
            <source src="./audio/macka.mp3"></source>
        </audio>
        <audio id="audio-patka">
            <source src="./audio/patka.mp3"></source>
        </audio>
        <audio id="audio-kokoska">
            <source src="./audio/kokoska.mp3"></source>
        </audio>
        <audio id="audio-pas">
            <source src="./audio/pas.mp3"></source>
        </audio>
    </div>
    <?php
        require_once("./components/footer.php");
    ?>
    <script src="./js/script.js"></script>
</body>
</html>