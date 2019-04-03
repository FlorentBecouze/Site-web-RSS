<?php class Validation {
	
	public static function validationForm($login, $mdp)
	{
		if(!isset($login) || $login == "")
		{
			return NULL;
		}
		
		if(!isset($mdp) || $mdp == "")
		{
			return NULL;
		}

		$login = filter_var($login, FILTER_SANITIZE_STRING);
		$mdp = filter_var($mdp, FILTER_SANITIZE_STRING);
	
		$tab["login"] = $login;
		$tab["mdp"] = $mdp;
		
		return $tab;
	}
	
	public static function validateAction($action)
	{
		$action = filter_var($action, FILTER_SANITIZE_STRING);
		
		return $action;
	}

	public static function validateAjoutSite($name, $url) {
		$name = filter_var($name, FILTER_SANITIZE_STRING);
		$url = filter_var($url, FILTER_SANITIZE_STRING);

		if(!isset($name) || $name == "") {
			return NULL;
		}

		if(!isset($url) || $url == "") {
			return NULL;
		}

		
		$xml = new XMLParser(new Sites(0, $url, $name));

		if(!$xml->isValidRSS()) {
			return NULL;
		}

		$tab["name"] = $name;
		$tab["url"] = $url;

		return $tab;
	}


} ?>













