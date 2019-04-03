<html>
<head>
	<meta charset="utf-8"/>
		<title>Artiklator</title>
		<link rel="stylesheet" href="css/styleAdmin.css">
	</head>
<body>
	<header>
		<h1>Artiklator (Admin)</h1>
	</header>
	
	<?php
	
		if(isset($_SESSION['role']) && isset($_SESSION['login'])) {

			echo "<aside>Rôle: ".$_SESSION['role']."<br><br>Nom d'utilisateur: ".$_SESSION['login']."<br></aside>";
		}
		
		if(isset($sites)) {
			echo "<table id='table'>";
			echo "<tr><th>Index</th> <th>Nom du site</th> <th>URL du flux RSS</th> <th>Action</th></tr>";

			foreach($sites as $site) {
				$id = $site->getId();
				$name = $site->getName();
				$url = $site->getUrl();

				echo "<tr><td>$id</td> <td>$name</td> <td>$url</td>";
				echo "<td>
						<form method='POST' action='index.php?action=supprimerSite&name=".$name."&url=".$url."'>
							<input type='submit' value='Supprimer'/>
						</form> 
					</td>";
				echo "</tr>";
			}

			echo "</table>";
		}
	?>

	<form id="ajouterSite" method="POST" action="index.php?action=ajouterSite">
		<h3>Ajouter un flux RSS</h3>
		Name:
		<input id="formElement" type="text" name="name" value="<?php if(isset($_REQUEST["name"])) { echo $_REQUEST["name"]; } ?>"/><br>

		Url:
		<input id="formElement" type="text" name="url" value="<?php if(isset($_REQUEST["url"])) { echo $_REQUEST["url"]; } ?>"/><br>

		<input id="formElement" type="submit" value="Ajouter site"/><br>
	</form>

	<div id="retour"> <!-- division utile pour permettre les margin côté CSS -->
		<a id="retour" href="index.php"> Quitter le mode admin </a>
		<!-- id sur le lien utile pour permettre le text-decoration:none côté CSS -->
	</div>


	<footer>
			Site de news par lecture de flux RSS réalisé par Florent et Clément
			2A-G7 de l'université informatique Clermont-Auvergne 2018
	</footer>

</body>
</html>
