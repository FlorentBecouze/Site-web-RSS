<?php
	require_once(__DIR__.'/config/config.php');
	require_once(__DIR__.'/config/Autoload.php');

	try {
		// Chargement de l'autoloader
		Autoload::charger();
		
		// Chargement de la connection à la base
		//$con = new Connection("mysql:host=localhost; dbname=dbcltorti", "root", "");
		$con = new Connection("mysql:host=localhost; dbname=projet_news", "root", "");
		
		// Chargement de la session
		session_start();
		
		// Chargement du controller
		$controller = new FrontController();
		
	} catch(PDOException $exception) {
	
		print("Erreur PDO: ".$exception);
		
	} catch(RuntimeException $exception) {
		print("Erreur Runtime: ".$exception);
	}
?>

