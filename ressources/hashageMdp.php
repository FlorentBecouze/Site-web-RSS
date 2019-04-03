<?php

	$mdp="28";
	
	$hash=password_hash($mdp, PASSWORD_DEFAULT);
	
	echo $hash;

?>