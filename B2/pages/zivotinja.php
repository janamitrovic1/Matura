<?php 
	$zivotinje = array(
		"pas" => array(
			"naslov" => "Pas",
			"opis" => "Pas (lat. Canis lupus familiaris) je domaća životinja iz porodice pasa. Prati čoveka već hiljadama godina i koristi se u razne svrhe — kao ljubimac, čuvar, vodič i pomagač. Najstariji dokazi ukazuju na to da je pas pripitomljen još pre oko 14.000 godina."
		),
		"patka" => array(
			"naslov" => "Patka",
			"opis" => "Patka je vodena ptica koja pripada porodici Anatidae, zajedno sa guskom i labudom. Iako nisu svi bliski srodnici, naziv 'patka' se koristi za različite vrste manjih plivačica koje često borave na jezerima, rekama i močvarama."
		),
		"macka" => array(
			"naslov" => "Mačka",
			"opis" => "Mačka (lat. Felis catus) je mala mesožderka koja je pripitomljena pre oko 9.500 godina. Poznata je po svojoj nezavisnosti i okretnosti, a često se drži kao kućni ljubimac u domaćinstvima širom sveta."
		),
		"kokoska" => array(
			"naslov" => "Kokoška",
			"opis" => "Kokoška (lat. Gallus gallus domesticus) je domaća ptica koja se najčešće uzgaja zbog jaja i mesa. Poreklom je iz Azije, a danas je rasprostranjena na svim kontinentima i predstavlja najbrojniju vrstu ptica na svetu."
		),
		"krava" => array(
			"naslov" => "Krava",
			"opis" => "Krava je ženka goveda koja se najčešće koristi za proizvodnju mleka. Mlečni proizvodi poput sira, jogurta i pavlake prave se upravo od kravljeg mleka. Pored toga, krave su ranije korišćene i za vuču tereta."
		),
	);

	if(empty($_GET["zivotinja"])) {
		header("location: /");
		exit(0);
	}
	$zivotinja = $zivotinje[$_GET["zivotinja"]];
	if(empty($zivotinja)) {
		header("location: /");
		exit(0);
	}
?>
<!DOCTYPE html>
<html lang="sr">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/global.css">
	<link rel="stylesheet" href="../css/zivotinja.css">
	<title><?php echo $zivotinja["naslov"]; ?></title>
</head>
<body>
	<h1><?php echo $zivotinja["naslov"]; ?></h1>
	<p><?php echo $zivotinja["opis"]; ?></p>
</body>
</html>
