<?php 
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );

    function traer_info_compositorxs() {
        $api_response = file_get_contents( 'http://localhost/php/proyecto-compositorxs/api/all' );

        if ( $api_response !== false ) {
            $lista_compositorxs = json_decode( $api_response, true );
        }

        return $lista_compositorxs;
    }

    function imprimir_ficha_compositorx ( $lista ) {
            $ficha_compositorx  = '';

        for ( $i = 0; $i < count( $lista ); $i++ ) {
            $ficha_compositorx .= '<article>';
            $ficha_compositorx .= '<h2>' . $lista[$i]['nombre'] . '</h2>';
            $ficha_compositorx .= '<p>' . $lista[$i]['bio']  . '</p>';
            $ficha_compositorx .= '<figure><img src="' . $lista[$i]['pic']  . '"</img></figure>';
            $ficha_compositorx .= '</article>';
        }

        return $ficha_compositorx;
    }

?>
