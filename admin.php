<?php
session_start();
include 'db.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['profile_picture'])) {
    $upload_dir = 'uploads/';
    $target_file = $upload_dir . basename($_FILES['profile_picture']['name']);

    // Move uploaded file to server directory
    if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target_file)) {
        // Resize image to 1024 pixels in width
        list($width, $height) = getimagesize($target_file);
   $new_width = 1024;
$new_height = round(($height / $width) * $new_width); // Round the height to an integer

// Create a new image resource with the new size
$source = imagecreatefromstring(file_get_contents($target_file));
$resized_image = imagecreatetruecolor($new_width, $new_height);
imagecopyresampled($resized_image, $source, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        
        // Save the resized image
        imagejpeg($resized_image, $target_file, 85); // Adjust quality as needed
        imagedestroy($source);
        imagedestroy($resized_image);

        // Save position data in the database as well
        $x_pos = $_POST['x_pos'] ?? 0; // Default X position if not provided
        $y_pos = $_POST['y_pos'] ?? 0; // Default Y position if not provided

        $query = "UPDATE users SET profile_picture = ?, x_pos = ?, y_pos = ? WHERE username = 'tasndzou'";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$target_file, $x_pos, $y_pos]);
        echo "Profile picture updated!";
    } else {
        echo "Error uploading profile picture.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Picture Upload</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> <!-- If Bootstrap is available -->
</head>
<body>
    <h2>Admin Panel</h2>
    <form method="POST" enctype="multipart/form-data">
        <label for="profile_picture">Upload Profile Picture:</label>
        <input type="file" name="profile_picture" id="profile_picture" required accept="image/*">
        <input type="hidden" name="x_pos" id="x_pos">
        <input type="hidden" name="y_pos" id="y_pos">
        <button type="submit">Update</button>
    </form>

    <div id="preview">
        <div class="front-person-img">
            <img id="image_preview" src="" alt="Image Preview" />
        </div>
    </div>

    <a href="logout.php" class="btn btn-danger">Logout</a>

    <script>
        document.getElementById('profile_picture').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.getElementById('image_preview');
                    img.src = e.target.result;
                    img.style.display = 'block'; // Show the image
                    img.style.transform = 'rotate(0deg)'; // Reset rotation
                    document.getElementById('preview').style.display = 'flex'; // Show the preview container
                }
                reader.readAsDataURL(file);
            }
        });

        // Drag to reposition image
        const img = document.getElementById('image_preview');
        let isDragging = false, startX, startY, initialX = 0, initialY = 0;

        img.addEventListener('mousedown', function(e) {
            isDragging = true;
            startX = e.clientX - initialX;
            startY = e.clientY - initialY;
            img.style.cursor = 'grabbing';
        });

        document.addEventListener('mouseup', function() {
            isDragging = false;
            img.style.cursor = 'grab';
            // Save the final position for submission
            document.getElementById('x_pos').value = initialX;
            document.getElementById('y_pos').value = initialY;
        });

        document.addEventListener('mousemove', function(e) {
            if (isDragging) {
                initialX = e.clientX - startX;
                initialY = e.clientY - startY;
                img.style.transform = `translate(${initialX}px, ${initialY}px)`; // Move the image without rotation
            }
        });
    </script>
</body>
<style>
    /* Styles for preview container */
  #preview {
    top: 40px;
    width: 500px; /* 480px image + 20px for the border */
    height: 500px; /* 480px image + 20px for the border */
    display: flex;
    align-items: center;
    justify-content: center;
    border: 10px solid rgb(15, 5, 5); /* Red border for visibility */
    background: #ffffff;
    position: relative;
    margin: 10px auto; /* Center the preview */
    transform: rotate(45deg); /* Rotate the preview container */
    overflow: hidden; /* Hide overflow */
}


/* Existing styles for .front-person-img */
.front-person-img {
width: 480px;
height: 480px;
overflow: hidden;
background: #583232;
position: relative;



-webkit-transition: height 0.5s 0.3s ease, transform 0.5s 0.8s ease;
-moz-transition: height 0.5s 0.3s ease, transform 0.5s 0.8s ease;
transition: height 0.5s 0.3s ease, transform 0.5s 0.8s ease;
-webkit-transform: rotate(45deg);
-moz-transform: rotate(45deg);
-ms-transform: rotate(45deg);
-o-transform: rotate(45deg);
transform: rotate(-45deg);
border-radius: 0;
}

/* Inner image styling to align and rotate */
.front-person-img > img {
max-width: 100%;
position: relative;
left: -65px;

}



/* Custom styles for logout button */
.btn-danger {
    display: inline-block;
    padding: 10px 20px;
    background-color: #24146e; /* Red background for "danger" style */
    color: #fff;
    text-align: center;
    text-decoration: none;
    border-radius: 4px;
    font-weight: bold;
}

.btn-danger:hover {
    background-color: #0c134d; /* Darker shade for hover effect */
    color: #fff;
}

</style>
</html>