<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $date = htmlspecialchars($_POST['date']);
    $phone = htmlspecialchars($_POST['phone']);
    $location = htmlspecialchars($_POST['location']);

    // Your email where you want to receive the form details
    $to = "kriteshketan@gmail.com"; // Replace with your actual email
    $subject = "New Quote Request from $name";

    $headers = "From: $email\r\n" .
               "Reply-To: $email\r\n" .
               "Content-Type: text/plain; charset=UTF-8";

    $message = "You have received a new quote request.\n\n";
    $message .= "Name: $name\n";
    $message .= "Email: $email\n";
    $message .= "Building Date: $date\n";
    $message .= "Phone: $phone\n";
    $message .= "Location: $location\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "<script>alert('Your request has been sent successfully!'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Failed to send request. Please try again later.'); window.location.href='index.html';</script>";
    }
} else {
    echo "Invalid request.";
}
?>
