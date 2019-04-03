<html>
	<head>
		<meta charset="utf-8"/>
		<title>Artiklator Erreur</title>
		<link rel="stylesheet" href="css/styleErreur.css">
	</head>
<body>
	<div align="center" id="main">
		<h1> Hmm, c'est embarassant ...</h1>
		<h2>
			<?php if(isset($dErreur["titre"])) {
					echo $dErreur["titre"];
					}  else {
						echo "Erreur non détectée";
					}
			?>
		</h2>
		<h3>
			<?php if(isset($dErreur["message"])) {
						echo $dErreur["message"];
						}  else {
							echo "Veuillez contacter les webmasters: <br><br>adresse1@live.fr<br>adresse2@live.fr";
						}
			?>
		</h3>
		
		
		
		<!-- Récupération dans un tableau des champs du formulaire pour pouvoir les retourner à la page Admin -->
		<?php
			$params=['action' => 'afficherAccueil',
					'name' => $_REQUEST["name"],
					'url' => $_REQUEST["url"]
					];
		?>
		
		
		<div id="lien"> <!-- division utile pour permettre les margin côté CSS -->
			<a id="lien" href="index.php"> Revenir à la page d'accueil </a></br></br>
			
			<!-- Permet de garder en mémoire les champs du formulaire lors d'un retour sur la page Admin -->
			<!-- Permet de passer des variables en GET -->
			<a id="lien" href=<?php echo 'index.php?'.http_build_query($params); ?>> Revenir en page admin </a> 
			<!-- id sur les liens utile pour permettre le text-decoration:none côté CSS -->
		</div>
		
	</div>
	
</body>
</html>
