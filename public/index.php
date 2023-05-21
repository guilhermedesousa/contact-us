<?php

session_start();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Font family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300;400&display=swap" rel="stylesheet">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="./css/style.css">
    <title>Contact Us</title>
</head>
<body>
<main class="container">
    <div class="form-wrapper">
        <form id="contact-us-form" action="../src/contactProcess.php" method="post">
            <h1>Get in touch with us</h1>
            <p>Hi, need help? Use the form below to contact us.</p>
            <input type="hidden" name="action" value="submitContactForm">

            <label for="name">Name</label>
            <input type="text" name="name" id="name" required placeholder="Rachel Joe" autocomplete="off">

            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" required placeholder="Rachel@domain.com" autocomplete="off">

            <label for="message">Message</label>
            <textarea name="message" id="message" cols="30" rows="5" placeholder="Type your message here..." required autocomplete="off"></textarea>

            <button type="submit">Send my message</button>

            <p class="feedback"></p>
        </form>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $("#contact-us-form").submit(function (e) {
            e.preventDefault();
            const formData = $(this).serialize();

            $.ajax({
                type: "POST",
                url: "../src/contactProcess.php",
                data: formData,

                success: function (response) {
                    $(".feedback").html(response);
                }
            });
        });
    });
</script>
</body>
</html>