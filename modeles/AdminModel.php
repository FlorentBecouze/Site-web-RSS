<?php
	class AdminModel {
		public function connexion(): bool {
			global $con;
			
			$data = Validation::validationForm($_REQUEST["login"], $_REQUEST["mdp"]);
			
			if(!isset($data)) {
				setErreur("Erreur de connexion", "Données de connexion incorrectes");
				return false;
			}
			
			$adminGw = new AdminGateway($con);
			if($adminGw->isAdmin($data["login"], $data["mdp"])) {
				$_SESSION["role"] = 'admin';
				$_SESSION["login"] = $data["login"];
				
				return true;
			} else {
				setErreur("Erreur de connexion", "Données de connexion incorrectes");
			}
			
			return false;
		}
		
		
		public function deconnexion() {
			session_unset();
			session_destroy();
			$_SESSION = array();
		}
		
		
		public static function isAdmin() {
			if(!isset($_SESSION['role']) || !isset($_SESSION['login'])) {
				return null;
			}
			
			if($_SESSION['role'] != "admin") {
				return null;
			}
			
			
			return new Admin($_SESSION['login'], "");

		}
		
		
		public function getAllSites() {
			global $con;
			
			$sitesGw = new SitesGateway($con);
			
			return $sitesGw->getAllSites();
		}

		public function ajouterSite(): bool {
			global $con;

			$data = Validation::validateAjoutSite($_REQUEST["name"], $_REQUEST["url"]);

			if(!isset($data)) {
				return false;
			}

			$sitesGw = new SitesGateway($con);

			try {

				$sitesGw->addSites($data["name"], $data["url"]);

				return true;
			} catch(PDOException $exception) {
				return false;
			}

		}

		public function supprimerSite(): bool {
			global $con;

			if(!isset($_REQUEST["name"])) {
				return false;
			}

			$name = Validation::validateAction($_REQUEST["name"]);
			$url = Validation::validateAction($_REQUEST["url"]);

			$sitesGw = new SitesGateway($con);

			$sitesGw->delSites($name, $url);

			return true;
		}
		
	}
?>























