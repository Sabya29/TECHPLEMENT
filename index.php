<?php
// Displays error (if any arise)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quotes_db";

// connection should be established
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if connection establishment is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$login_error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    // Checks if username exists
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verifies the entered password
        if (password_verify($password, $row['password'])) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $username;
            header("Location: home.php");
            exit();
        } else {
            $login_error = "Invalid password.";
        }
    } else {
        $login_error = "No user found with that username.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="formstyle.css">
</head>
<body>

<div class="header">
    <img src="images/scroll.png" alt="Icon" class="header-icon">
    <h1>DailyQuotient</h1>
    <p>- Serving up a daily dose of inspirational quotes.</p>
</div>

    <div class="container">
        <h1>Login</h1>
        <?php
        if ($login_error) {
            echo "<p style='color: red;'>$login_error</p>";
        }
        ?>
        <form method="POST" action="index.php">
            <div>
                <label for="username">Username:</label>
                <input type="text" name="username" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <div class="back-link">
            <a href="register.php">Don't have an account? Register here</a>
        </div>
    </div>

<footer>
    <p>&copy; <?php echo date("Y"); ?> DailyQuotient. All rights reserved.</p>
</footer>

</body>
</html>

