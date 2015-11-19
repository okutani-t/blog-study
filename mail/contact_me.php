<?php
// Check for empty fields
if(empty($_POST['name'])        ||
   empty($_POST['email']) 	||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
{
  echo "No arguments Provided!";
  return false;
}

mb_language("Japanese");
mb_internal_encoding("UTF-8");

$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// Create the email and send the message
$to = 'okutani.nt@gmail.com';
$email_subject = "Join blog study: $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: noreply@okutani.net\n";
$headers .= "Reply-To: $email_address";

mb_send_mail($to,$email_subject,$email_body,$headers);

return true;
