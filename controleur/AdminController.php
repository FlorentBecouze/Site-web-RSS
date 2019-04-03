<?php
	class AdminController {
		
		public function __construct() {
			global $vues;
			
			$action = NULL;
 		
 			// Récupération de l'action effectuée par l'utilisateur
 			if(isset($_REQUEST['action'])) {
 				$action = $_REQUEST['action'];
 			}

			switch($action) {
				case "NULL":
					$this->afficherAccueil();
					break;
				case "afficherAccueil":
					$this->afficherAccueil();
					break;
				case "ajouterSite":
					$this->ajouterSite();
					break;
				case "supprimerSite":
					$this->supprimerSite();
					break;
				case "deconnexion":
					$this->deconnexion();
					break;
				default:
					setErreur("Action inconnue", "Erreur d'appel php");
 					require_once($vues['vueErreur']);
			}
		}
		
		
		
		private function afficherAccueil() {
			global $vues, $a;
			
			$adminMdl = new AdminModel();
			
			$sites = $adminMdl->getAllSites();
			
			require($vues["vueAdmin"]);
		}
		
		private function ajouterSite() {
			global $vues, $dErreur;
			// Traitement d'ajout
			$adminMdl = new AdminModel();

			if($adminMdl->ajouterSite()) {
				$this->afficherAccueil();
			} else {
				setErreur("Ajout de flux RSS impossible.", "Les informations fournies sont invalides ou déjà existantes.");
				require($vues["vueErreur"]);
			}

			
		}
		
		private function supprimerSite() {
			global $vues, $dErreur;
			// Traitement de la suppression
			$adminMdl = new AdminModel();

			if($adminMdl->supprimerSite()) {
				$this->afficherAccueil();
			} else {
				setErreur("Erreur de suppression du flux RSS", "Une erreur est survenue");
				require($vues["vueErreur"]);
			}
			
		}
		
		private function deconnexion() {
			$adminMdl = new AdminModel();
			$adminMdl->deconnexion();
			
			$_REQUEST["action"] = NULL;
			$frontCon = new FrontController();
		}
		

		
	}

?>
