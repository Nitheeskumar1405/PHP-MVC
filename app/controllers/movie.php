<?php

class Movie extends Controller
{
    public function index()
    {
        $this->view('movie/index');
    }

    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['movie'])) {
            $api = $this->model('Api');
            $movie_title = $_POST['movie'];
            $movie = $api->search_movie($movie_title);

            // Log the API response
            error_log("API Response: " . print_r($movie));

            // Pass the movie data directly to the view
            $this->view('movie/results', ['movie' => $movie]);
        } 
    }

   
}
