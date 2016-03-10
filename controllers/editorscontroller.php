<?php

function index()
{
    include( 'models/editors.php' );

    $data['page_title'] = 'Editors - Biblio2';
    $data[ 'editors' ] = getEditors();
    $data[ 'view' ] = 'views/indexeditors.php';
    return $data;
}

function show()
{
    include( 'models/editors.php' );

    $id = isset( $_GET[ 'id' ] )?intval( $_GET[ 'id' ] ):0; // On récupere l'id entré.
    if ( $id == 0 ) {
        die( 'l\'éditeur demandé n\'existe pas' );
    }

    $data[ 'editor' ] = getEditor( $id );
    $data[ 'page_name' ] = 'Fiche de ' . $data[ 'editor' ] -> name;
    $data[ 'view' ] = 'views/showeditors.php';

    return $data;
}
//Les controllers serve à analyser ce que l'utilisateur demander.
