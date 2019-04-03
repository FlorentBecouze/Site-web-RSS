<?php

class XMLParser {
	private $site;
	private $xml;

	public function __construct(Sites $site) {
		global $vues, $dErreur;

		$this->site = $site;

		$this->xml = simplexml_load_file($site->getUrl());
		
		
	}

	public function getLatestNews() {
		$news = [];

		for($i=0; $i<3; $i++) {
			$title = $this->xml->channel->item[$i]->title;
			$link = $this->xml->channel->item[$i]->link;
			$content = $this->xml->channel->item[$i]->description;
			$date = $this->xml->channel->item[$i]->pubDate;
			$date2 = date("D, d M Y H:i:s", strtotime($date));

			if(!isset($title)) {
				break;
			}

			$news[] = new News(0, $title, $content, $this->site->getName(), $link, $date2);
		}

		return $news; 
	}

	public function isValidRSS(): bool {
		return $this->xml->channel != NULL;
	}

}

?>