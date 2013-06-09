<?php
 
class Plugin_Flickr extends Plugin
{
	var $meta = array(
		'name'			 => 'Flickr',
		'version'		 => '1',
		'author'		 => 'Nikolai Strandskogen',
		'author_url' => 'http://twitter.com/nkstrand'
		);

		const api_key = 'YOUR API KEY';
		const format = 'json&nojsoncallback=1';
		const url	= 'http://api.flickr.com/services/rest/?method=';

		public function sets()
		{
			$limit	= $this->fetch_param('limit', 5, 'is_numeric');
			$id = $this->fetch_param('id', null);
			$params = "flickr.photosets.getPhotos&photoset_id=$id&extras=url_m,url_l&per_page=$limit";
			
			if ($response = $this->flickr_curl($params)) {
				return object_to_array($response->photoset);
			}
			
			return false;
		}

		public function api()
		{
			$params = $this->fetch_param('request', false);

			if ($params) {
				if ($response = $this->flickr_curl($params)) {
					print_r($response);
					return object_to_array($response);
				}						 
			}

			return false;
		}	
	
	
		function flickr_curl($params) 
		{
			$request = curl_init(self::url.$params.'&api_key='.self::api_key.'&format='.self::format);
			curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
			
			$contents = curl_exec($request);
			
			if ($contents)
				return json_decode($contents);
				
				echo "Flickr requires the CURL library to be installed."; // else
		}
}	

function object_to_array($d) 
{
	if (is_object($d)) {
		$d = get_object_vars($d);
	}

	if (is_array($d)) {
		return array_map(__FUNCTION__, $d);
	}
	else {
		return $d;								
	}
}


