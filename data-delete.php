<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$id = '';


if  ( ! empty ( $_GET ) ) {

    /* ID compositorx a editar */
    if ( ! empty( $_GET['id']  ) ) {
        $id = $_GET['id'];
    }

    $connection = new mysqli( 'localhost', 'root', '', 'proyecto_compositorxs' );

    if ( $id !== '' ) {
        $result = $connection->query( 'DELETE FROM compositorxs
            WHERE id = "'. $id .'"');

        header( 'Location: admin.php?ok=true' );
 
    } else {
        header( 'Location: admin.php?ok=false' );
    }


} else {
   header( 'Location: admin.php?ok=false' );
}