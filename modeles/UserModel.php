<?php

	class UserModel {
		
		public function afficherNews() {
			global $con;

			$newsGw = new NewsGateway($con);
			
			return $newsGw->getAllNews();

		}
		
	}
?>
