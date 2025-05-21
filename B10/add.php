<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodavanje novih reci</title>
    <link rel="stylesheet" href="css/globals.css">
    <link rel="stylesheet" href="css/home.css">
    <!-- <link rel="stylesheet" href="css/add.css"> -->
</head>
<body>
    <?php
        require_once "components/nav.php";
    ?>
    <div class="main">
        <div class="container">
            <form action="">
                <label for="eng">Engleska rec:</label>
                <input type="text" name="eng" id="eng" maxlength="50" required> <br>
                <label for="srb">Srpska rec:</label>
                <input type="text" name="srb" id="srb" maxlength="50" required> <br>
                <label for="opis">Opis:</label>
                <textarea name="opis" id="opis"></textarea><br>
                
                <input type="submit" value="Snimi" id="submit">
            </form>
        </div>
    </div>
    <?php
        require_once "database/connection.php";
        if( isset($_GET['eng']) && isset($_GET['srb']) && isset($_GET['opis'])){
            $eng = $_GET['eng'];
            $srb = $_GET['srb'];
            $opis = $_GET['opis'];

            $sql = "INSERT INTO recnik (Engleski,Srpski,Opis) VALUES ('$eng', '$srb', '$opis')";
            if($conn->query($sql) === TRUE){
                echo "<script>alert('Reč je uspešno dodata!');</script>";
            } else {
                echo "<script>alert('Greška: " . $conn->error . "');</script>";
            }
        }
    ?>
    <!-- <?php
        require_once "components/footer.php";
    ?> -->
</body>
</html>