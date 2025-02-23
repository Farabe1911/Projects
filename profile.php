<?php
session_start();
include 'db.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Fetch user's profile picture and position data
$query = "SELECT profile_picture, x_pos, y_pos FROM users WHERE id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Profile</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h2>Your Profile</h2>
<div id="profile-pic">
    <?php if ($user['profile_picture']): ?>
        <div class="profile-picture" style="overflow: hidden; width: 300px; height: 200px; position: relative;">
            <img src="<?= htmlspecialchars($user['profile_picture']) ?>" 
                 style="position: absolute; left: <?= $user['x_pos'] ?>px; top: <?= $user['y_pos'] ?>px;" 
                 alt="Profile Picture">
        </div>
    <?php else: ?>
        <p>No profile picture uploaded.</p>
    <?php endif; ?>
</div>

<a href="logout.php">Logout</a>
</body>
</html>