<!DOCTYPE html>
<html>
<head>
    <title>Generate Review</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
    </style>
</head>
<body>
    <?php include_once 'app/views/partials/header.php'; ?>
    <h1>Generate AI Review</h1>
    <form method="POST" action="/review/generate">
        <label for="movie_title">Movie Title:</label>
        <input type="text" name="movie_title" id="movie_title" required>
        <button type="submit">Generate Review</button>
    </form>
</body>
</html>
