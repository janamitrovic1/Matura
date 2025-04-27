<!DOCTYPE html>
<html lang="sr-RS">
<body>
    <header>
        <?php echo $naslov ?>
    </header>
    <nav>
        <a href="../index.php" class="link <?php echo($url=="index"?"active":"")?>">Почетна</a>
        <a href="../pages/autor.php" class="link <?php echo($url=="autor"?"active":"")?>">О аутору</a>
        <a href="../pages/uputstvo.php" class="link <?php echo($url=="uputstvo"?"active":"")?>">Упутство</a>
    </nav>
</body>
</html>