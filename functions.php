<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

/* Consultar api compositorxs */

function traer_info_compositorxs() {
    $api_response = file_get_contents('http://localhost/php/proyecto-compositorxs/api/all');

    if ( $api_response !== false ) {
        $lista_compositorxs = json_decode( $api_response, true );
    }

    return $lista_compositorxs;
}

/* Imprimir en html info compositorxs */

function imprimir_ficha_compositorx( $lista ) {
    $ficha_compositorx  = '';

    for ( $i = 0; $i < count( $lista ); $i++ ) {
        $ficha_compositorx .= '<article class="ficha-compositorx"><details>';
        $ficha_compositorx .= '<summary><h2 class="nombre-compositorx">' . $lista[$i]['nombre'] . '</h2></summary>';
        $ficha_compositorx .= '<p>' . $lista[$i]['bio']  . '</p>';
        $ficha_compositorx .= '<figure><img src="' . $lista[$i]['pic']  . '"</img></figure>';
        $ficha_compositorx .= '</details></article>';
    }

    return $ficha_compositorx;
}

/* Cambiar opción en menu si admin esta loguedx */

function menuAdmin() {

    session_start();

    if ( !empty( $_SESSION['logged-in'] )
        && $_SESSION['logged-in'] === TRUE ) {

        $menu_admin = "Admin";
    } else {

        $menu_admin = "Admin Login";
    }

    return $menu_admin;
}
