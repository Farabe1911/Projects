<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include database connection
include 'db.php'; 

// Hash the new password
$hashed_password = password_hash('TFclassified@1911', PASSWORD_DEFAULT);

// Update the existing username 'admin'
$query = "UPDATE users SET password = :password WHERE username = 'tasndzou'";
$stmt = $pdo->prepare($query);

try {
    $stmt->execute(['password' => $hashed_password]);
    echo "User password updated successfully!";
} catch (PDOException $e) {
    echo "Error updating user: " . $e->getMessage();
}
?>