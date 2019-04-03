<?php

class Connection extends PDO {
	private $stmt;
	
	public function __construct(string $dsn, string $username, $mdp) {
		$this->stmt = parent::__construct($dsn, $username, $mdp);
		$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	}
	
	public function executeQuery(string $query, array $params= []): bool {
		$this->stmt = parent::prepare($query);
		
		foreach($params as $key=>$value) {
			$this->stmt->bindValue($key, $value[0], $value[1]);
		}
		
		return $this->stmt->execute();
	}
	
	public function getResults() {
		return $this->stmt->fetchAll();
	}
}

?>
