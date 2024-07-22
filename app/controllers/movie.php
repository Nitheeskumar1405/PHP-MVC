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

            error_log("API Response: " . print_r($movie));

            
            

            // Pass the movie data directly to the view
            $this->view('movie/results', ['movie' => $movie]);
           
        } else {
            $this->view('movie/search');
        }
    }

    public function rate()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['movieId'], $_POST['rating'])) {
            $movieId = $_POST['movieId'];
            $rating = $_POST['rating'];
            $userId = $_SESSION['user_id'] ?? null; 
            
			// Validate rating
            if (is_numeric($rating) && $rating >= 1 && $rating <= 5) {
                $ratingModel = $this->model('Rating');
                $ratingModel->addRating($userId, $movieId, $rating);
            }
        }

        header('Location: /movie');
    }
}
