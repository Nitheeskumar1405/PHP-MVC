<header>
    <nav>
        <ul>
            <li><a href="/home">Home</a></li>
            <li><a href="/review">Get Review</a></li>
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
                <li><a href="/logout">Logout</a></li>
            <?php else: ?>
                <li><a href="/login">Login</a></li>
            <?php endif; ?>
            <li>
                <form action="/movie/search" method="post">
                    <input type="text" name="movie" placeholder="Search for a movie..." required>
                    <button type="submit">Search</button>
                </form>
            </li>
        </ul>
    </nav>
</header>
