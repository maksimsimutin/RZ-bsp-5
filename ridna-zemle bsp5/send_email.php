<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form fields and remove whitespace
    $name = strip_tags(trim($_POST["user-name"]));
    $name = str_replace(array("\r","\n"),array(" "," "),$name);
    $tel = trim($_POST["user-tel"]);
    $email = filter_var(trim($_POST["user-email"]), FILTER_SANITIZE_EMAIL);
    $comment = trim($_POST["user-comment"]);

    // Check that data was submitted to the mailer
    if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Set a 400 (bad request) response code and exit
        http_response_code(400);
        echo "Please complete the form and try again.";
        exit;
    }

    // Set the recipient email address
    // заменить !!!!!
    $recipient = "youremail@example.com";  

    // Set the email subject
    $subject = "New contact from $name";

    // Build the email content
    $email_content = "Name: $name\n";
    $email_content .= "Tel: $tel\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Comment:\n$comment\n";

    // Build the email headers
    $email_headers = "From: $name <$email>";

    // Send the email
    if (mail($recipient, $subject, $email_content, $email_headers)) {
        // Set a 200 (okay) response code
        http_response_code(200);
        echo "Thank you! Your message has been sent.";
    } else {
        // Set a 500 (internal server error) response code
        http_response_code(500);
        echo "Oops! Something went wrong and we couldn't send your message.";
    }

} else {
    // Not a POST request, set a 403 (forbidden) response code
    http_response_code(403);
    echo "There was a problem with your submission, please try again.";
}