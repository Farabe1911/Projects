<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include database connection
include 'db.php'; 
session_start();
session_regenerate_id(true); // Prevent session fixation

// Generate CSRF token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        echo "<p style='color: red;'>Invalid CSRF token.</p>";
        exit;
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        // Fetch user from the database
        $query = "SELECT * FROM users WHERE username = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        // Check if the user exists and verify the password
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                header('Location: admin.php');
                exit;
            } else {
                error_log("Password mismatch for user: $username");
                echo "<div class='alert alert-danger' role='alert'>Invalid login credentials.</div>";
            }
        } else {
            error_log("User not found: $username");
            echo "<div class='alert alert-danger' role='alert'>Invalid login credentials.</div>";
        }
    } catch (Exception $e) {
        error_log("Error during login: " . $e->getMessage());
        echo "<div class='alert alert-danger' role='alert'>An error occurred. Please try again later.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Admin Login</h2>
        <form method="POST" action="">
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>