<?php

class news_controller extends base_controller {
	
	/*-------------------------------------------------------------------------------------------------
	Reference: http://www.sitepoint.com/simplexml-and-namespaces/
	-------------------------------------------------------------------------------------------------*/
	public function namespaced_xml() {
	
		$test_xml = '<?xml version="1.0" encoding="utf-8"?>
		<rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
		xmlns="http://purl.org/rss/1.0/" xmlns:dc="http://purl.org/dc/elements/1.1/">
		<channel rdf:about="http://www.sitepoint.com/">
		<title>SitePoint.com</title>
		<link>http://www.sitepoint.com/</link>
		<description>SitePoint is the natural place to go to grow your online business.</description>
		<items>
		<rdf:Seq>
		<rdf:li rdf:resource="http://www.sitepoint.com/article/take-command-ajax" />
		</rdf:Seq>
		</items>
		</channel>
		<item rdf:about="http://www.sitepoint.com/article/take-command-ajax">
		<title>Take Command with AJAX</title>
		<link>http://www.sitepoint.com/article/take-command-ajax</link>
		<description>Want to get a bang out of your AJAX artillery?</description>
		<dc:date>2005-10-14T04:00:00Z</dc:date>
		</item>
		<item rdf:about="http://www.sitepoint.com/article/second-item-test">
		<title>Second Item Test</title>
		<link>http://www.sitepoint.com/article/second-item-test</link>
		<description>Second Item Test</description>
		<dc:date>2005-10-14T04:00:00Z</dc:date>
		</item>
		</rdf:RDF>';
		
		$results = Array();
		
		# XML is hardcoded above for testing purposes
		// $test_xml = Utils::curl('http://news.yahoo.com/rss/');
		
		$data     = simplexml_load_string($test_xml);	
		
		foreach ($data->item as $item) {
		
			# Namespaced data
			$ns_data  = (Array)$item->children('http://purl.org/dc/elements/1.1/');		  
			
			# Regular data
			$reg_data = (Array)$item;
			
			# Merge together 
			$all_data = array_merge($ns_data,$reg_data);
			
			# Add to results
			array_push($results, $all_data);
		}
		
		echo Debug::dump($results,"");
		
}
	
	
	/*-------------------------------------------------------------------------------------------------
	
	-------------------------------------------------------------------------------------------------*/
	public function index() { 
				 
        $results = Utils::curl('http://news.yahoo.com/rss/');
        $results = Utils::xml_to_array($results);
        
        $items = $results['channel']['item'];
        
        foreach($items as $story) {       
        	echo $story['title']."<br>";
        }
	}
	
}