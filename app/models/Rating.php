<?php

class Rating
{
    private $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function addRating($userId, $movieId, $rating)
    {
        $stmt = $this->db->prepare("INSERT INTO ratings (user_id, movie_id, rating) VALUES (:user_id, :movie_id, :rating)");
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':movie_id', $movieId, PDO::PARAM_STR);
        $stmt->bindParam(':rating', $rating, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getMovieRating($movieId)
    {
        $stmt = $this->db->prepare("SELECT AVG(rating) as average_rating FROM ratings WHERE movie_id = :movie_id");
        $stmt->bindParam(':movie_id', $movieId, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['average_rating'];
    }
}
