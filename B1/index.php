<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/globals.css">
    <link rel="stylesheet" href="./css/nav.css">
	<link rel="stylesheet" href="./css/kontejner.css">
    <title>B1 - Foto Galerija</title>
</head>
<body>
    <?php
		$url = "index";
        include_once './components/nav.php'; 
    ?>
	<div class="full-container">
		<div class="galerija">
			<textarea readonly class="text">Lorem ipsum dolor sit amet consectetur,adipisicing elit. Veniam ducimus ut temporibus, beatae, laboriosam cum deserunt fugiat incidunt consequatur aliquid sunt, unde placeat doloremque. Aspernatur culpa magnam molestias ullam natus.
			</textarea>
			<div class="velikaslika">
				<img src="./slike/slika1.jpg" id="centralnaslika" alt="Centarlna slika">
			</div>
			<div class="maleslike">
				<img src="./slike/slika1.jpg" class="malaslika" alt="Slika1">
				<img src="./slike/slika2.jpg" class="malaslika" alt="Slika2">
				<img src="./slike/slika3.jpg" class="malaslika" alt="Slika3">
				<img src="./slike/slika4.jpg" class="malaslika" alt="Slika4">
				<img src="./slike/slika5.jpg" class="malaslika" alt="Slika5">
				<img src="./slike/slika6.jpg" class="malaslika" alt="Slika6">
				<img src="./slike/slika7.jpg" class="malaslika" alt="Slika7">
				<img src="./slike/slika8.jpg" class="malaslika" alt="Slika8">
				<img src="./slike/slika9.jpg" class="malaslika" alt="Slika9">
				<img src="./slike/slika10.jpg" class="malaslika" alt="Slika10">
			</div>
		</div>
	</div>
	<script src="./js/pocetna.js"></script>
</body>
</html>