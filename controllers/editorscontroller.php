<?php
// analyser ce que l'utilisateur veux vraiment.
namespace Controller;

use Model\Editors;
use Model\Books;
use Model\Authors;

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
        if ( !isset( $_GET[ 'id' ] ) ) {
            die( 'Il manque l\'identifiant de votre livre' );
        }
        $id = intval( $_GET[ 'id' ] );
        $editor = $this -> editors_model -> find( $id );
        $authors = null;
        $books = null;

        if ( isset( $_GET[ 'with' ] ) ) {
            // $with = $_GET[ 'with' ];
            // $parts = explode( ',', $with );
            $with = explode( ',', $_GET[ 'with' ] );
            if ( in_array( 'authors', $with ) ) {
                $authors_model = new Authors();
                $authors = $authors_model -> getAuthorsByEditorId( $editor -> id );
            }
            if ( in_array( 'books', $with ) ) {
                $books_model = new Books();
                $books = $books_model -> getBooksByEditorId( $editor -> id );
            }
        }

        return [
            'editor' => $editor,
            'view' => 'showeditors.php',
            'page_title' => 'ebooks - ' . $editor -> name,
            'authors' => $authors,
            'books' => $books
        ];
    }
    //Les controllers serve à analyser ce que l'utilisateur demander.

}
