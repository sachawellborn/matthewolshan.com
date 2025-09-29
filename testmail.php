<?php
$to = "rdickerson6@gmail.com";
$subject = "Test mail";
$message = "Hello! This is a simple email message.";
$from = "postmaster@/matthewolshan.com";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);
echo "Mail Sent.";
?>