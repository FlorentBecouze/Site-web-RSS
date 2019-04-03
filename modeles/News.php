<?php
	class News {
		private $id;
		private $title;
		private $content;
		private $website;
		private $link;
		private $date;
		
		public function __construct(int $id, string $title, string $content, string $website, string $link, $date) {
			$this->id = $id;
			$this->title = $title;
			$this->content = $content;
			$this->website = $website;
			$this->link = $link;
			$this->date = $date;
		}
		
		public function __toString(): string {
			return "<a href='$this->website'>$this->website</a><br><h3>$this->title</h3><br>$this->content<br>$this->date<br>";
		}

		public function getWebsite(): string {
			return $this->website;
		}

		public function getLink(): string {
			return $this->link;
		}

		public function getTitle(): string {
			return $this->title;
		}

		public function getContent(): string {
			return $this->content;
		}

		public function getDate() {
			return $this->date;
		}
	}
?>
