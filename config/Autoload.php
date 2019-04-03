<?php
	class Autoload {
		private static $_instance = null;
		
		public static function charger() {
			if(null !== self::$_instance) {
				throw new RuntimeException(sprintf('%s is already started', __CLASS__));
			}
			
			self::$_instance = new self();
			
			// Execution de la méthode static '_autoload' qui réécrit 'spl_autoload_register'
			if(!spl_autoload_register(array(self::$_instance, '_autoload'), false)) {
				throw new RuntimeException(sprintf('%s: Could not start the autoload', __CLASS__));
			}
		}
		
		private static function _autoload($class) {
			global $rep;
			
			$filename = $class.'.php';
			
			// Tous les répertoires à parcourir pour trouver la classe
			$dir = array('modeles/', './', 'config/', 'controleur/');
			
			foreach($dir as $d) {
				// On construit le nom du chemin complet
				$file = $rep.$d.$filename;

				// On regarde si ce fichier existe
				// si oui on l'importe
				if(file_exists($file)) {
					include $file;
					return;
				}
			}
			
			
		}
		
		
	}
?>
