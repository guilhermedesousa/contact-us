<?php

session_start();

if (isset($_POST) && $_POST['action'] === "submit") {
    if (!isset($_SESSION['has_submitted_the_form'])) {
        $senderName = $_POST['name'] ?? '';
        $senderEmail = $_POST['email'] ?? '';
        $senderMessage = $_POST['message'] ?? '';

        $to = "guilhermedesousa.dev@gmail.com";
        $subject = "Contact form submission";

        $headers = [];
        $headers[] = "MIME-Version: 1.0";
        $headers[] = "Content-type: text/plain; charset=utf-8";
        $headers[] = "From: $senderName $senderEmail";
        $headers[] = "Reply-To: $senderEmail";
        $headers[] = "X-Mailer: PHP/" . phpversion();

        // mail($to, $subject, $senderMessage, implode("\r\n", $headers));
        $_SESSION['has_submitted_the_form'] = 1;

        echo 'Your message has been sent.';
    } else {
        echo 'You have already submitted the form.';
    }
} else {
    echo 'Invalid request.';
}