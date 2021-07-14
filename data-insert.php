<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$nombre = '';
$bio    = '';
$pic    = '';

if  ( ! empty ( $_POST ) ) {
    
    if ( ! empty( trim( $_POST['nombre'] ) ) && is_string( $_POST['nombre'] ) ) {
        $nombre= mb_strtolower( $_POST['nombre'], "UTF-8" );
        var_dump($nombre);
    }

    if(  ! empty( trim( $_POST['bio'] ) ) && is_string( $_POST['bio'] ) ) {
        $bio = $_POST['bio'];
    }

    if( ! empty( trim( $_POST['pic'] ) ) && filter_var( $_POST['pic'], FILTER_VALIDATE_URL) ) {
        $pic = $_POST['pic'];
    }

    if ( $nombre !== '' && 
        $bio !== '' &&
        $pic !== '') {

        $connection = new mysqli( 'localhost', 'root', '', 'proyecto_compositorxs' );

        $result = $connection->query( 'INSERT INTO compositorxs (nombre, bio, pic)
        VALUES ("' . $connection->real_escape_string( $nombre ) . '",
        "' . $connection->real_escape_string( $bio ) . '",
        "' . $connection->real_escape_string( $pic ) . '")');

        header( 'Location: admin.php?ok=true' );

    } else {
        header( 'Location: admin.php?ok=false' );
    }

} else {
   header( 'Location: admin.php?ok=false' );
}