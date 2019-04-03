<?php
	// Acces au dossier root
	$rep = __DIR__.'/../';
	
	// BDD de base pour PhpMyAdmin
	$login = "root";
	$mdp = ""; 
	
	// Vue
	$vues['vueNews'] = $rep.'vues/vueNews.php';
	$vues['vueAdmin'] = $rep.'vues/vueAdmin.php';
	$vues['vueErreur'] = $rep.'vues/vueErreur.php';
	$vues['vueConnection'] = $rep.'vues/vueConnection.php';
	
	// Données d'erreurs
	$dErreur;
	$dVue;
	
	function setErreur(string $titre, string $message) {
		global $dErreur;
		
		$dErreur["titre"] = $titre;
		$dErreur["message"] = $message;
	}
	
?>
