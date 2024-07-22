<!DOCTYPE html>
<html>
<head>
    <title>Movie Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .movie-info {
            margin-top: 20px;
        }
        .movie-poster {
            max-width: 300px;
        }
    </style>
</head>
<body>
    <?php include_once 'app/views/partials/header.php'; ?>
    <h1>Movie Search Results</h1>



    <pre><?php print_r($movie); ?></pre>

    <div class="movie-info">
        <h2><?php echo !empty($movie['Title']) ? htmlspecialchars($movie['Title']) : 'Title not available'; ?></h2>
        <p><strong>Year:</strong> <?php echo !empty($movie['Year']) ? htmlspecialchars($movie['Year']) : 'N/A'; ?></p>
        <p><strong>Rated:</strong> <?php echo !empty($movie['Rated']) ? htmlspecialchars($movie['Rated']) : 'N/A'; ?></p>
        <p><strong>Released:</strong> <?php echo !empty($movie['Released']) ? htmlspecialchars($movie['Released']) : 'N/A'; ?></p>
        <p><strong>Runtime:</strong> <?php echo !empty($movie['Runtime']) ? htmlspecialchars($movie['Runtime']) : 'N/A'; ?></p>
        <p><strong>Genre:</strong> <?php echo !empty($movie['Genre']) ? htmlspecialchars($movie['Genre']) : 'N/A'; ?></p>
        <p><strong>Director:</strong> <?php echo !empty($movie['Director']) ? htmlspecialchars($movie['Director']) : 'N/A'; ?></p>
        <p><strong>Writer:</strong> <?php echo !empty($movie['Writer']) ? htmlspecialchars($movie['Writer']) : 'N/A'; ?></p>
        <p><strong>Actors:</strong> <?php echo !empty($movie['Actors']) ? htmlspecialchars($movie['Actors']) : 'N/A'; ?></p>
        <p><strong>Plot:</strong> <?php echo !empty($movie['Plot']) ? htmlspecialchars($movie['Plot']) : 'N/A'; ?></p>
        <p><strong>Language:</strong> <?php echo !empty($movie['Language']) ? htmlspecialchars($movie['Language']) : 'N/A'; ?></p>
        <p><strong>Country:</strong> <?php echo !empty($movie['Country']) ? htmlspecialchars($movie['Country']) : 'N/A'; ?></p>
        <p><strong>Awards:</strong> <?php echo !empty($movie['Awards']) ? htmlspecialchars($movie['Awards']) : 'N/A'; ?></p>
        <p><img class="movie-poster" src="<?php echo !empty($movie['Poster']) ? htmlspecialchars($movie['Poster']) : ''; ?>" alt="Movie Poster"></p>
        <p><strong>IMDB Rating:</strong> <?php echo !empty($movie['imdbRating']) ? htmlspecialchars($movie['imdbRating']) : 'N/A'; ?></p>
        <p><strong>IMDB Votes:</strong> <?php echo !empty($movie['imdbVotes']) ? htmlspecialchars($movie['imdbVotes']) : 'N/A'; ?></p>
        <p><strong>Metascore:</strong> <?php echo !empty($movie['Metascore']) ? htmlspecialchars($movie['Metascore']) : 'N/A'; ?></p>
        <p><strong>Box Office:</strong> <?php echo !empty($movie['BoxOffice']) ? htmlspecialchars($movie['BoxOffice']) : 'N/A'; ?></p>
    </div>

    <form method="POST" action="/movie/rate">
        <input type="hidden" name="movieId" value="<?php echo htmlspecialchars($movie['imdbID']); ?>">
        <label for="rating">Rate this movie:</label>
        <select name="rating" id="rating">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <button type="submit">Submit Rating</button>
    </form>

    <?php
    $ratingModel = new Rating();
    $averageRating = $ratingModel->getMovieRating($movie['imdbID']);
    if ($averageRating !== null) {
        echo "<p>Average Rating: " . round($averageRating, 2) . "/5</p>";
    }
    ?>
</body>
</html>
