<?php

class news_controller extends base_controller {
	
	public function index() { 
		
		$results = Utils::curl('http://news.yahoo.com/rss/');
		$results = Utils::xml_to_array($results);
		
		$items = $results['channel']['item'];
		
		foreach($items as $story) {
			
			echo $story['title']."<br>";
			
		}
		
		
	}
	
}