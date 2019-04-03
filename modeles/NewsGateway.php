<?php


	class NewsGateway {
		private $con;
		
		public function __construct(Connection $con) {
			$this->con = $con;
		}
		
		// Méthodes faisant appel à la class News
		public function insert(string $title, string $content, string $website, string $time) {
			$query = "INSERT INTO TNews VALUES(:id, :title, :content, :website, :time);";
			
			$this->con->executeQuery($query, [':id'=>[10, PDO::PARAM_INT],
										':title' => [$title, PDO::PARAM_STR],
										':content' => [$content, PDO::PARAM_STR],
										':website' => [$website, PDO::PARAM_STR],
										':time' => [$time, PDO::PARAM_STR]]);
										
		}

		/*
		public function getNews(string $title): News {
			$query = "SELECT * FROM TNews WHERE title=:title;";
			
			$this->con->executeQuery($query, [':title'=>[$title, PDO::PARAM_STR]]);
			
			$array = $this->con->getResults();
			$a = $array[0];

			return new News($a["id"], $a["title"], $a["content"], $a["website"], $a["time"]);
		}
		*/

		// Parcours tous les sites référencés et récupère pour chaque les dernières news
		public function getAllNews() {
			global $con;

			$sitesGw = new SitesGateway($con);
			$sites = $sitesGw->getAllSites();

			$news = [];

			foreach($sites as $site) {
				$parser = new XMLParser($site);
				$newsSite = $parser->getLatestNews();

				foreach($newsSite as $new) {
					$news[] = $new;
				}

			}

			
			// Trie les news selon le paramètre passé en argument
			$trie = NULL;

			if(isset($_COOKIE["trie"])) {
				$trie = $_COOKIE["trie"];
			}

			if(isset($_REQUEST["trie"])) {
				$trie = Validation::validateAction($_REQUEST["trie"]);
				setcookie("trie", $trie, time() + 365 * 24 * 3600);
			}

			switch($trie) {
				case "site":
				break;
				case "date":
				default:
					usort($news, function($a, $b) {
					$t1 = strtotime($a->getDate());
					$t2 = strtotime($b->getDate());

					return $t2 - $t1;
				});
			}
			

			return $news;
		}


		public function delNews(int $id) {
			$query = "DELETE FROM TNews WHERE id=:id;";
			
			$this->con->executeQuery($query, [":id"=>[$id, PDO::PARAM_INT]]);
		}
		
		
	}
?>
