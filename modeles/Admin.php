<?php
	class Admin {
		private $login;
		private $mdp;
		
		public function __construct(string $login, string $mdp) {
			$this->login = $login;
			$this->mdp = $mdp;
		}
		
		public function __toString(): string {
			return $login;
		}
	}
?>
