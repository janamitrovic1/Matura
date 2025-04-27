<!DOCTYPE html>
<html>
    <body>
        <div class="header">
            <div>
                <h1><?php echo $url?></h1>
            </div>
        </div>
        <nav>
            <div class="links">
                <a href="../index.php" class="link <?php echo ($url == "Фото галерија" ? "active" : "") ?>">Početna</a>
                <a href="../pages/autor.php" class="link <?php echo($url == "Фото галерија - аутор" ? "active" : "")?>">O autoru</a>
                <a href="../pages/uputstvo.php" class="link <?php echo($url=="Фото галерија - упутство"? "active":"") ?>">Uputstvo</a>
                <span>Zavrsni ispit</span>
            </div>
            
        </nav>
    </body>
</html>