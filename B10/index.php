<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/globals.css">
    <title>Elektronski rečnik</title>
</head>
<body>
    <?php
        require_once "components/nav.php";
    ?>
    <div class="main">
        <div class="container">
            <form action="">
                <label for="smer">Smer:</label>
                <select name="smer" id="smer" placeholder="Izaberite smer prevodjenja">
                    <option value="rstoeng">Srpski - Engleski</option>
                    <option value="engtors">Engleski - Srpski</option>
                </select> <br>
                <label for="eng">Engleska rec:</label>
                <input type="text" name="eng" id="eng"> <br>
                <label for="srb">Srpska rec:</label>
                <input type="text" name="srb" id="srb"> <br>
                <label for="opis">Opis:</label>
                <textarea name="opis" id="opis"></textarea><br>
                
                <input type="submit" value="Prevedi" id="submit">
            </form>
        </div>
    </div>
    <?php
        require_once "components/footer.php";
    ?>
</body>
</html>