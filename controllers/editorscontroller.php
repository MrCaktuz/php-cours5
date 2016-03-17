<?php

class EditorsController
{
    private $editors_model = null;

    public function __construct() // function qui s'exe quand on fait le new.
    {
        $this -> editors_model = new Editors(); // On le rajoute avant getBooks
    }

    public function index()
    {
        // include( 'models/editors.php' );
        // remplacé par : $this -> editors_model -> devant all

        $data['page_title'] = 'Editors - Biblio2';
        $data[ 'editors' ] = $this -> editors_model -> all();
        $data[ 'view' ] = 'views/indexeditors.php';
        return $data;
    }

    public function show()
    {
        // include( 'models/editors.php' );
        // remplacé par : $this -> editors_model -> devant find

        $id = isset( $_GET[ 'id' ] )?intval( $_GET[ 'id' ] ):0; // On récupere l'id entré.
        if ( $id == 0 ) {
            die( 'l\'éditeur demandé n\'existe pas' );
        }

        $data[ 'editor' ] = $this -> editors_model -> find( $id );
        $data[ 'page_name' ] = 'Fiche de ' . $data[ 'editor' ] -> name;
        $data[ 'view' ] = 'views/showeditors.php';

        return $data;
    }
    //Les controllers serve à analyser ce que l'utilisateur demander.

}
