<?php
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );

$compositorxs = array();
$search = '';

$connection = new mysqli( 'localhost', 'root', '', 'proyecto_compositorxs' );


if  ( $connection->connect_error ) {
    die( 'No se ha podido establecer conexión' );
} else {

    if ( ! empty( $_GET['search'] ) && is_string( $_GET['search'] ) ) {

        $search =  trim( $_GET['search'] );

        $result = $connection->query( 'SELECT * FROM compositorxs 
            WHERE nombre LIKE "%' . $search . '%"' );
        
        while ( $fila = $result->fetch_assoc() ) {
        
            $compositorx = array();
    
            $compositorx['nombre'] = $fila['nombre'];
            $compositorx['bio'] = $fila['bio'];
            $compositorx['pic'] = $fila['pic'];
    
            $compositorxs[] = $compositorx;
        }    
    }
}


header ( 'Content-Type: application/json' );
echo json_encode( $compositorxs );

?>