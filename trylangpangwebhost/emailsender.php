<?php
if(isset($_POST['sender'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Set up email parameters
    $mailTo = "lpochea@bpsu.edu.ph";
    $headers = "From: ".$email;
    $txt = "You have received an email from ".$name.".\n\n".$message;

    // Send the email
    mail($mailTo, "New Message from Contact Form", $txt, $headers);

  }
?>