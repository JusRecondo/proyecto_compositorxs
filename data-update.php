<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$id = '';

$nombre_modificado = '';
$bio_modificada    = '';
$pic_modificada    = '';


if  ( ! empty ( $_POST ) ) {

    /* ID compositorx a editar */
    if ( ! empty( $_POST['id-editar']  ) ) {
        $id = $_POST['id-editar'];
    }

     /* Valores para modificar */
    if ( ! empty( trim( $_POST['nombre-modificado'] ) ) && is_string( $_POST['nombre-modificado'] ) ) {
        $nombre_modificado = mb_strtolower( $_POST['nombre-modificado'], "UTF-8" );
    }

    if(  ! empty( trim( $_POST['bio-modificada'] ) ) && is_string( $_POST['bio-modificada'] ) ) {
        $bio_modificada = $_POST['bio-modificada'];
    }

    if( ! empty( trim( $_POST['pic-modificada'] ) ) && filter_var( $_POST['pic-modificada'], FILTER_VALIDATE_URL) ) {
        $pic_modificada = $_POST['pic-modificada'];
    }

    $connection = new mysqli( 'localhost', 'root', '', 'proyecto_compositorxs' );


    if ( $id !== '' ) {

        if ( $nombre_modificado !== '' ) {
            $result = $connection->query( 'UPDATE compositorxs
            SET nombre = "' . $connection->real_escape_string( $nombre_modificado ) . '"
            WHERE id = "'. $id .'"');
        }
    
        if ( $bio_modificada !== '' ) {
            $result = $connection->query( 'UPDATE compositorxs
            SET bio = "' . $connection->real_escape_string( $bio_modificada ) . '"
            WHERE id = "'. $id .'"');
        }
    
        if ( $pic_modificada !== '' ) {
            $result = $connection->query( 'UPDATE compositorxs
            SET pic = "' . $connection->real_escape_string( $pic_modificada ) . '"
            WHERE id = "'. $id .'"');
        }

        header( 'Location: admin.php?ok=true' );
 
    } else {
        header( 'Location: admin.php?ok=false' );
    }


} else {
   header( 'Location: admin.php?ok=false' );
}