<?php

	class FrontController {
		public function __construct() {
			global $vues, $dErreur;
			
			$listeAction_Admin = ["deconnexion", "afficherAccueil", "ajouterSite", "supprimerSite"];
			
			try {
				// Role de la personne connecté
				$a = AdminModel::isAdmin(); // Retourne NULL si non admin
				
				// Nettoyage de l'action
				$action = null;
				if(isset($_REQUEST["action"])) {
					$action = Validation::validateAction($_REQUEST["action"]);
				}
				
				// Est-ce qu'il s'agit d'une action utilisateur ?
				if(in_array($action, $listeAction_Admin)) {
					// Est-ce qu'il a les droits
					if($a == NULL) {
						require($vues["vueConnection"]);
					} else {
						$adminCon = new AdminController();
					}
					
					
				} else {
				
					$userCon = new UserController();
				
				}
				

			} catch(PDOException $exception) {
				setErreur("PDOException", $exception->getMessage());
			}
			
		}
	}
?>
