<?php
class Sites {
	private $id;
	private $url;
	private $name;
	
	public function __construct(int $id, string $url, string $name) {
		$this->id = $id;
		$this->url = $url;
		$this->name = $name;
	}
	
	public function __toString(): string {
		return $this->id.". ".$this->name.": ".$this->url;
	}
	
	public function getUrl(): string {
		return $this->url;
	}

	public function getName(): string {
		return $this->name;
	}

	public function getId(): int {
		return $this->id;
	}
}
?>
