<?php
	class AdminGateway {
		private $con;
		
		public function __construct(Connection $con) {
			$this->con = $con;
		}
		
		public function isAdmin(string $login, string $mdp): bool {
			$query = "SELECT mdp FROM tadmin WHERE login=:login";
			
			$this->con->executeQuery($query, [":login" => [$login, PDO::PARAM_STR]]);
			
			$array = $this->con->getResults();
			$a = $array[0];
			
			return password_verify($mdp, $a["mdp"]);
		}
	}
?>
