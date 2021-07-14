window.addEventListener( 'load', function() {

    /* 
    * Menu mobile 
    */

    const openMenuBtn = document.querySelector( '#openMenuBtn' );

    const menuItems = document.querySelectorAll('.menu-item');

    function navResponsive() {
        openMenuBtn.addEventListener( 'click', () => {
            document.body.classList.toggle( 'mobile-menu-active' );
        } );

        menuItems.forEach( function( menuItem ) {
            menuItem.addEventListener( 'click', function() {
                document.body.classList.remove( 'mobile-menu-active' );

                let currentItem = document.querySelector( '.active ' );
                currentItem.classList.remove( 'active' );
                this.classList.add( 'active' );
            } );
        } );
    }

    navResponsive();

   
    /* 
    * Formulario de búsqueda index - admin
    */
    const formBusqueda = document.querySelector( '#formBusqueda' );
    const campoBusqueda = document.querySelector( '#busquedaCompositorx' );
    const resultadoBusqueda = document.querySelector( '#resultadoBusqueda' );
    const formEdit = document.querySelector( '#formEdit' );
    const idAEditar = document.querySelector( 'input[name="id-editar"]' );

    if ( formBusqueda ) {
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
    
                if(data.length === 0) {
                    let aviso = document.createElement( 'H2');    
                    resultadoBusqueda.appendChild( aviso );
    
                    aviso.innerText = "No hay resultados."; 
                } else {
                    let ficha;
                    let fichaNombre;
                    let nombre;
                    let enlaceEdit;
                    let bio;
                    let pic;

                    for ( let i = 0; i < data.length; i++ ) {
                        ficha =  document.createElement( 'DETAILS');
                        ficha.classList.add('ficha-compositorx');
                        fichaNombre = document.createElement( 'SUMMARY');
                        nombre = document.createElement( 'H2');
                        nombre.classList.add('nombre-compositorx');
                        enlaceEdit = document.createElement( 'A');
                        enlaceEdit.classList.add('enlace-edit', 'hidden');
                        bio = document.createElement( 'P');
                        pic = document.createElement( 'FIGURE');
        
                        resultadoBusqueda.appendChild( ficha );
                        ficha.appendChild( fichaNombre );
                        fichaNombre.appendChild( nombre );

                        ficha.appendChild( enlaceEdit );
                        ficha.appendChild( bio );
                        ficha.appendChild( pic );
        
                        nombre.innerText = data[i].nombre;
                        bio.innerText = data[i].bio;
                        pic.innerHTML = `<img src="${data[i].pic}" 
                            alt="Foto de ${data[i].nombre}">`; 

                        enlaceEdit.innerText = "editar/eliminar";
                        enlaceEdit.href = "#formEdit";
                        enlaceEdit.dataset.id = data[i].id;
                        enlaceEdit.dataset.nombre = data[i].nombre;    

                        if( formEdit && eliminarFicha) {
                            enlaceEdit.classList.remove('hidden');
                        }
                    }

                    const enlacesEdit = document.querySelectorAll('.enlace-edit');

                    enlacesEdit.forEach( function( e ) {
                        e.addEventListener( 'click', function() {
                            idAEditar.value = e.dataset.id;     
                                   
                            if( formEdit && eliminarFicha) {
                                formEdit.classList.remove('hidden');
                                eliminarFicha.classList.remove('hidden');
                            }

                            document.querySelector( '#formEditTitulo' ).innerHTML = "Editar " + e.dataset.nombre;

                        } );
                    } );
    
                }
    
            } )
    
        } );    
    }
  

    /* Aviso al enviar formulario index - admin */
    const sectionAviso = document.querySelector( '.aviso' );

    setTimeout( () => {
        if ( sectionAviso ) {
            sectionAviso.classList.toggle('hide');
        }
    }, 1000 );

    /* Eliminar ficha - admin */

    const eliminarFicha = document.querySelector( '#eliminarFicha' );

    if (  eliminarFicha ) {
        eliminarFicha.addEventListener( 'click', function() {
            document.querySelector( '#confirmar' ).href = 'data-delete.php?id=' + idAEditar.value;            
            
            eliminarFicha.innerText = eliminarFicha.innerText === "Eliminar ficha" ? "Cancelar" : "Eliminar ficha";
        } ); 
    }

} );