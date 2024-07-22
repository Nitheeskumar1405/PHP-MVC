


<?php

class Api {
	private $apiKey;

		public function __construct() {
			$this->apiKey = OMDB_API_KEY;
			

		}
	

		public function search_movie ($movie_title) {
			$query_url = "http://www.omdbapi.com/?apikey=".$this->apiKey."&t=" . $movie_title;

			$json = file_get_contents($query_url);
			$phpObj = json_decode($json);
			$movie =  (array) $phpObj;
			return $movie;
		}

}
