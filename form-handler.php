<?php
// Sanitize and validate input
$name = htmlspecialchars($_POST['name']);
$visitor_email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$subject = htmlspecialchars($_POST['subject']);
$message = htmlspecialchars($_POST['message']);

if (!$visitor_email) {
    die("Invalid email address.");
}

// Use domain-based sender for better delivery
$email_from = 'no-reply@uttu.atwebpages.com'; // Use an address from your domain
$email_subject = 'New Form Submission from Website';
$email_body = "Name: $name\nEmail: $visitor_email\nSubject: $subject\nMessage:\n$message";

$to = 'itsuttamsah@gmail.com';

$headers = "From: $email_from\r\n";
$headers .= "Reply-To: $visitor_email\r\n";

if (mail($to, $email_subject, $email_body, $headers)) {
    echo "Email sent successfully!";
} else {
    echo "Failed to send email. Please try again.";
}
?>
