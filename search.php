<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<!-- Navigation Bar -->
<nav class="navbar">
    <div class="website-name">
        <img src="images/scroll.png" alt="Icon" class="header-icon">
        <h1>DailyQuotient</h1>
    </div>
    <a href="home.php">Home</a>
    <a href="about.php">About Us</a>

    <form action="search.php" method="GET" class="navbar-search">
        <input type="text" name="author" placeholder="Search by author">
        <button type="submit">Search</button>
    </form>

    <div class="logout-link">
        <a href="logout.php">Logout</a>
    </div>
</nav>

<!-- If search bar is empty, result(all available quotes) should be displayed in 'empty-searc' container -->
    <div class="container <?php echo empty($_GET['author']) ? 'empty-search' : ''; ?>">
        <h1>Search Results</h1>
        <div class="quote-box">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "quotes_db";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            if (isset($_GET['author'])) {
                $author = $conn->real_escape_string($_GET['author']);
                $sql = "SELECT author, quote FROM quotes WHERE author LIKE '%$author%'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<p>\"".$row["quote"]."\"</p>";
                        echo "<p>- ".$row["author"]."</p>";
                        echo "<hr>";
                    }
                } else {
                    echo "No quotes found for '".$author."'.";
                }
            } else {
                echo "Please enter an author name.";
            }

            $conn->close();
            ?>
        </div>
        <div class="back-link">
            <a href="home.php">Back to Quote of the Day</a>
        </div>
    </div>

<footer>
    <p>&copy; <?php echo date("Y"); ?> DailyQuotient. All rights reserved.</p>
</footer>

</body>
</html>
