window.addEventListener( 'load', function() {
    
    const formBusqueda = document.querySelector( '#formBusqueda' );
    const campoBusqueda = document.querySelector( '#busquedaCompositorx' );
    const resultadoBusqueda = document.querySelector( '#resultadoBusqueda' );

    formBusqueda.addEventListener( 'submit', (e) => {
        e.preventDefault();

        resultadoBusqueda.innerHTML = '';
        let compositorx = campoBusqueda.value;

        fetch( 'http://localhost/php/proyecto-compositorxs/api/search/?search=' + compositorx )
        .then( (response) => {

            if ( !response.ok ) {
                throw Error( response.statusText );
            }
            return response.json();
        } )
        .then( (data) => {

            for ( let i = 0; i < data.length; i++ ) {
                let nombre = document.createElement( 'H2');
                let bio = document.createElement( 'P');
                let pic = document.createElement( 'FIGURE');

                resultadoBusqueda.appendChild( nombre );
                resultadoBusqueda.appendChild( bio );
                resultadoBusqueda.appendChild( pic );

                nombre.innerText = data[i].nombre;
                bio.innerText = data[i].bio;
                pic.innerHTML = `<img src="${data[i].pic}" 
                    alt="Foto de ${data[i].nombre}">`;
            }

        } )

    } );
    
} );