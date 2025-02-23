<?php
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Set error reporting to catch any potential issues
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set content type to UTF-8
header('Content-Type: text/html; charset=utf-8');

// Include PHPMailer files
require '/home/tasndzou/public_html/PHPMailer/src/Exception.php';
require '/home/tasndzou/public_html/PHPMailer/src/PHPMailer.php';
require '/home/tasndzou/public_html/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

// Secret key for reCAPTCHA
$secretKey = '6LeBnNYqAAAAAJMRRdEaE0Mi9UXt1p2dPe7-nT8j';

// Get the reCAPTCHA response from the form
$recaptchaResponse = $_POST['g-recaptcha-response'];

// Verify reCAPTCHA response with Google
$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$recaptchaResponse");
$responseKeys = json_decode($response, true);

// If reCAPTCHA verification fails, show an error
if (intval($responseKeys["success"]) !== 1) {
    echo json_encode(['error' => true, 'message' => 'Please complete the CAPTCHA verification.']);
    exit; // Stop the script execution if reCAPTCHA fails
}

try {
    // Server settings
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'farabetasnimul@gmail.com';            // SMTP username
    $mail->Password   = 'rekggxuxnejhvqoz';                    // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;          // Enable implicit TLS encryption
    $mail->Port       = 465;                                   // TCP port to connect to

    // Get user input from the form
    $name = isset($_POST['name']) ? $_POST['name'] : 'No Name';
    $userEmail = isset($_POST['email']) ? $_POST['email'] : 'No Email';
    $message = isset($_POST['message']) ? $_POST['message'] : 'No Message';

    // Recipients
    $mail->setFrom('farabetasnimul@gmail.com', "Website Contact: $name");     // From email
    $mail->addAddress('farabetasnimul@gmail.com', 'User');    // Add a recipient (can be your email for testing)

    // Set email subject and body
    $mail->Subject = "New website contact form sent by $name"; // Use the name in the subject
    $mail->isHTML(true);                                       // Set email format to HTML
    $mail->Body    = "<strong>Name:</strong> $name<br><strong>Email:</strong> $userEmail<br><strong>Message:</strong> $message"; // HTML message
    $mail->AltBody = "Name: $name\nEmail: $userEmail\nMessage: $message"; // Plain text for non-HTML clients

    // Send the email
    if ($mail->send()) {
        echo json_encode(['error' => false, 'message' => 'Message has been sent']); // Use JSON response
    } else {
        echo json_encode(['error' => true, 'message' => "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"]); // Use JSON response
    }
} catch (Exception $e) {
    // Catch errors related to PHPMailer
    echo json_encode(['error' => true, 'message' => "Message could not be sent. Mailer Error: {$mail->ErrorInfo} | Exception: {$e->getMessage()}"]); // Use JSON response
}
?>