<?php
 class UserController {
 	
 
 	public function __construct() {
 		global $vues, $dErreur;

 		$action = NULL;
 		
 		// Récupération de l'action effectuée par l'utilisateur
 		if(isset($_REQUEST['action'])) {
 			$action = $_REQUEST['action'];
 		}
 		
 		switch($action) {
 			case NULL:
 				$this->afficherNews();
 			break;
 			case 'connexion':
 				$this->connexion();
 			break;
 			default:
 				setErreur("Action inconnue", "Erreur d'appel php");
 				require($vues['vueErreur']);
 		}
 		

 		
 	}
 	
 	// Afficher la page de News principale
 	private function afficherNews() {
 		global $vues, $dVue;
 		
 		$userModel = new UserModel();
 		$dVue = $userModel->afficherNews();

 		require($vues['vueNews']);
 	}
 	

 	private function connexion() {
 		global $vues, $dErreur;
 		
		$adminMdl = new AdminModel();

		if($adminMdl->connexion()) {
			$_REQUEST["action"] = "afficherAccueil";
			$frontCon = new FrontController();
		} else {
			require($vues["vueConnection"]);
		}
	}

 }
?>





















