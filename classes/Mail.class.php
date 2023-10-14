<?php
    $to      = 'no.reply@energysolutionuk.com';
    $subject = 'Welcome to Energy Solution UK';
    $message = 'hello';
    $headers = 'From: no.reply@energysolutionuk.com'       . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);

    
?>