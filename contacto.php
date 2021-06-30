<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

    $nombre = '';
    $bio    = '';
    $pic    = '';
    $email  = '';

    if ( ! empty( $_POST ) ) {
        $nombre = is_string( $_POST['nombre'] ) ? $_POST['nombre'] : '';
        $bio    = is_string( $_POST['bio'] ) ? $_POST['bio'] : '';
        $pic    = filter_var( $_POST['pic'], FILTER_VALIDATE_URL) ? $_POST['pic'] : '';
        $email  = filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL) 
                            ? $_POST['email'] : '';

        $to = 'justina.recondo@gmail.com';
        $subject  = 'Quiero agregar unx compositorx';
        $headers  = 'From: ' . $email;
        $message  = '<html><body>';
        $message .= '<h2>' . $nombre . '</h2>';
        $message .= '<p>' . $bio . '</p>';
        $message .= '<a href="' . $pic . '" target="_blank">';
        $message .= "</body></html>";

        mail($to, $subject, $message, $headers);

        header( 'Location: index.php/?gracias=ok' );

    }


?>
