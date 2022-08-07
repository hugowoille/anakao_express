<?php

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$mailheader = "From:".$name."<".$email.">\r\n";

$recipient = "woille.hugo@gmail.com";

mail($recipient, $subject, $message, $mailheader) or die("Error!");

echo'
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact form</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Thank you for contacting me. I will get back to you as soon as possible!</h1>
        <p class="back">Go back to the <a href="index.html">homepage</a>.</p>
        
    </div>
</body>
</html>
';
if (isset($_POST['submit'])) {
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $secret = '6LcVjFUhAAAAAO1WOgHmU4Z3NJq6cI0RO2JWf3D7';
    $response = $_POST['token_generate'];
    $remoteip = $_SERVER['REMOTE_ADDR'];

    $request = file_get_contents($url . '?secret=' . $secret . '&response=' . $response);

    $result = json_decode($request);
    //print_r($result);
    if ($result->success == true) { ?>
        <script>
            alert("Data save successfully");
        </script>
    <?php } else {
    ?>
        <script>
            alert("Data not saved");
        </script>
<?php
    }
}

?>
