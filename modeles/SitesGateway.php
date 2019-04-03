<?php
class SitesGateway {
	private $con;
	
	public function __construct(Connection $con) {
		$this->con = $con;
	}
	
	public function getAllSites() {
		$query = "SELECT url, name FROM TSites";
		
		$this->con->executeQuery($query, []);
		
		$sitesArray = $this->con->getResults();
		$sites = [];
		
		$i = 0;
		foreach($sitesArray as $array) {
			$sites[] = new Sites($i, $array["url"], $array["name"]);
			$i++;
		}
		
		return $sites;
	}

	public function addSites(string $name, string $url ) {
		$query = "INSERT INTO TSites VALUES(:url, :name)";

		$this->con->executeQuery($query, [":url"=>[$url, PDO::PARAM_STR],
											":name"=>[$name, PDO::PARAM_STR]]);
	}

	public function delSites(string $name, string $url) {
		$query = "DELETE FROM TSites WHERE url=:url AND name=:name";
		$this->con->executeQuery($query, [":url"=>[$url, PDO::PARAM_STR],
											":name"=>[$name, PDO::PARAM_STR]]);
	}
}
?>
