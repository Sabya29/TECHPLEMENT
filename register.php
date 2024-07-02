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

$registration_error = '';
$registration_success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);
    $confirm_password = $conn->real_escape_string($_POST['confirm_password']);

    if ($password !== $confirm_password) {
        $registration_error = "Passwords do not match.";
    } else {
        // Hashes the password before storing (for security)
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Checks if username already exists
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $registration_error = "Username already exists.";
        } else {
            // Inserts new user into the database
            $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
            if ($conn->query($sql) === TRUE) {
                $registration_success = "Registration successful. You can now <a href='index.php'>login</a>.";
            } else {
                $registration_error = "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="formstyle.css">
</head>
<body>

<div class="header">
    <img src="images/scroll.png" alt="Icon" class="header-icon">
    <h1>DailyQuotient</h1>
    <p>- Serving up a daily dose of inspirational quotes.</p>
</div>

    <div class="container">
        <h1>Register</h1>
        <?php
        if ($registration_error) {
            echo "<p style='color: red;'>$registration_error</p>";
        }
        if ($registration_success) {
            echo "<p style='color: green;'>$registration_success</p>";
        }
        ?>
        <form method="POST" action="register.php">
            <div>
                <label for="username">Username:</label>
                <input type="text" name="username" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" required>
            </div>
            <div>
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" name="confirm_password" required>
            </div>
            <button type="submit">Register</button>
        </form>
        <div class="back-link">
            <a href="index.php">Already have an account? Login here</a>
        </div>
    </div>

<footer>
    <p>&copy; <?php echo date("Y"); ?> DailyQuotient. All rights reserved.</p>
</footer>


</body>
</html>
