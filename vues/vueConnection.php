<html>
	<head>
		<meta charset="utf-8"/>
		<title>Connection requise</title>
		<link rel="stylesheet" href="css/styleConnection.css">
	</head>
	<body>

		<div align="center" id="main">
			<h1> Se Connecter </h1>

			<h4> Vous devez fournir des informations correctes pour continuer </h4>

			<form method="POST" action="index.php?action=connexion">
				<div>
					Login:<br>
					<input id="textBox" type="text" name="login"><br>
				</div>
				<div id="divMdp">
					Mdp:<br>
					<input id="textBox" type="password" name="mdp"><br>
				</div>
				<div id="bouton">
					<input type="submit" value="Connexion"><br>
				</div>
			</form>
	
			<div id="retour"> <!-- division utile pour permettre le margin-top côté CSS -->
				<a id="retour" href="index.php"> Revenir à la page d'accueil </a>
				<!-- id sur le lien utile pour permettre le text-decoration:none côté CSS -->
			</div>
		</div>

	</body>
</html>
