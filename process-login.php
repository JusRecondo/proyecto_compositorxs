<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$email = '';
$password  = '';

if  ( ! empty ( $_POST ) ) {
    
    if ( ! empty( trim( $_POST['email'] ) ) && filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL ) ) {
        $email= $_POST['email'];
    }

    if(  ! empty( trim( $_POST['password'] ) ) && is_string( $_POST['password'] ) ) {
        $password = $_POST['password'];
    }

    if ( $email !== '' &&
        $password !== '' ) {

        $connection = new mysqli( 'localhost', 'root', '', 'proyecto_compositorxs' );

        $result = $connection->query( ' SELECT id FROM admins
        WHERE email = "' . $connection->real_escape_string( $email ) . '"
        AND password = "' . $connection->real_escape_string( $password ) . '" ');

        if ( $result->fetch_assoc() ) {
            session_start();    
            $_SESSION['logged-in'] = true;

            header( 'Location: admin.php' );

        } else {
            header( 'Location: login.php?user=invalid' );
        }       

    }  else {
        header( 'Location: login.php?user=invalid' );
    }   

} else {
    header( 'Location: login.php?user=invalid' );
}