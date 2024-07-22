<?php

class Review extends Controller
{
    public function index()
    {
        $this->view('review/index');
    }

    public function generate()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['movie_title'])) {
            $movie_title = $_POST['movie_title'];

            $gemini = $this->model('Gemini');
            $prompt = 'Please give a review of ' . htmlspecialchars($movie_title) . ' from someone that has an average of 4 out of 5.';
            $response = $gemini->generateContent($prompt);

            echo "<pre>";
            if (isset($response['error'])) {
                echo $response['error'];
            } else {
                print_r($response);
            }
            die;
        } else {
            $this->view('review/index');
        }
    }
}
