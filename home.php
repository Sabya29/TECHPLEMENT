<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Checks if the user is logged in(basically, session status)
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header("Location: index.php");
    exit();
}

// Checks if the page is being reloaded (to update quote)
if (isset($_GET['reload']) && $_GET['reload'] == 'true') {
    unset($_SESSION['quote_of_the_day']);
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quotes_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Checks if the quote is already stored in the session
if (!isset($_SESSION['quote_of_the_day'])) {
    // Fetch a random quote from the database
    $sql = "SELECT author, quote FROM quotes ORDER BY RAND() LIMIT 1";
    $result = $conn->query($sql);

    if (!$result) {
        die("Query failed: " . $conn->error);
    }

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['quote_of_the_day'] = [
            "quote" => $row["quote"],
            "author" => $row["author"]
        ];
    } else {
        $_SESSION['quote_of_the_day'] = [
            "quote" => "No quotes available.",
            "author" => ""
        ];
    }
}

// Retrieves the quote from the session
$quote = $_SESSION['quote_of_the_day']['quote'];
$author = $_SESSION['quote_of_the_day']['author'];

// Closes the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DailyQuotient-Home</title>
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

<div class="container">
    <h1>Quote of the Day</h1>
    
    <!-- Displays the fetched quote -->
    <div class="quote-box">
        <?php if ($quote !== "No quotes available.") : ?>
            <p>"<?php echo htmlspecialchars($quote); ?>"</p>
            <p>- <?php echo htmlspecialchars($author); ?></p>
        <?php else : ?>
            <p><?php echo $quote; ?></p>
        <?php endif; ?>
    </div>
    
    <!-- Link to go back to the main quote page (i.e. reload the page to get a new quote) -->
    <div class="back-link">
        <a href="home.php?reload=true">Fetch random quote</a>
    </div>

<footer>
    <p>&copy; <?php echo date("Y"); ?> DailyQuotient. All rights reserved.</p>
</footer>

</body>
</html>

