<!DOCTYPE html>
<html>
    <body>
        <div class="header">
            <div>
                <h1>Фото Галерија</h1>
            </div>
        </div>
        <nav>
            <div class="links">
                <a href="../index.php" class="link <?php echo ($url == "index" ? "active" : "") ?>">Početna</a>
                <a href="../pages/autor.php" class="link <?php echo($url == "autor" ? "active" : "")?>">O autoru</a>
                <a href="../pages/uputstvo.php" class="link <?php echo($url=="uputstvo"? "active":"") ?>">Uputstvo</a>
                <span>Zavrsni ispit</span>
            </div>
            
        </nav>
    </body>
</html>