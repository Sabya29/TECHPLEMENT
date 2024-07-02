<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
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
        <h1>About Us</h1>

        <div class="intro">
        <p>Welcome to <b>DailyQuotient</b> – your go-to platform for exploring and sharing knowledge. 
            Our website allows users to browse, read, and share a diverse range of articles and resources, 
            all centered around fostering learning and growth.
        </p>
        <h2>Our Technology:</h2>
        <p>
        Our website is powered by modern web technologies to provide a smooth and interactive experience:
        </p>
        <ul>
            <li>HTML: Structures the content and layout of our web pages.</li>
            <li>CSS: Styles the website, ensuring it looks clean and inviting.</li>
            <li> PHP: Handles server-side functionality, making the website responsive and dynamic.</li>
        </ul>
        <h3><u>Contact us</u></h3>
        </div>

        <div class="social-links">
            <a href="https://www.linkedin.com/in/sabya-sachi-rath-a1b196306" target="_blank">
                <img src="images/linkedIN icon.png" alt="LinkedIn" class="social-icon">
            </a>
            <a href="https://github.com/Sabya29" target="_blank">
                <img src="images/Github icon.png" alt="GitHub" class="social-icon">
            </a>
        </div>
    </div>
    
    <footer>
        <p>&copy; <?php echo date("Y"); ?> DailyQuotient. All rights reserved.</p>
    </footer>
</body>
</html>
