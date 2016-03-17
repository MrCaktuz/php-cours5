<?php
// analyser ce que l'utilisateur veux vraiment.
namespace Controller;

use Model\Authors;
use Model\Books;

class AuthorsController
{
    private $authors_model = null;

    public function __construct() // function qui s'exe quand on fait le new.
    {
        $this -> authors_model = new Authors(); // On le rajoute avant getBooks
    }

    // Un controller c'est quelque chose qui controle ce que l'uitilisateur veut/donne et produit les donné qui vont etre renvoyer dans les views et dont quel view va etre utilisé.


    //  else{
    //     $books = getBooks();
    //     // $view = 'views/allbooks.php'; // supprimé grace à la ligne 36, 38.
    // }

    public function index() {
        // include( 'models/' . $GLOBALS[ 'e' ] . '.php' );
        // remplacé par : $this -> authors_model ->  devant all

        $data[ 'authors' ] = $this -> authors_model -> all();
        $data[ 'view' ] = 'views/' . $GLOBALS[ 'a' ] . $GLOBALS[ 'e' ] . '.php';

        return $data;
    }

    public function show() {
        // if ( isset( $_GET[ 'id' ] ) ) {
        //     $id = intval( $_GET[ 'id' ] ); // intval nous permet de vérifier si c'est bien un entier.
        //     // include( 'models/' . $GLOBALS[ 'e' ] . '.php' );
        //     // remplacé par : $this -> authors_model ->  devant find
        //
        //     // $book = getBook( $id );
        //     // $view = 'views/singlebook.php'; // supprimé grace à la ligne 36, 38.
        //     $data[ 'author' ] = $this -> authors_model -> find( $id );
        //     $data[ 'view' ] = 'views/' . $GLOBALS[ 'a' ] . $GLOBALS[ 'e' ] . '.php';
        //     $data[ 'books' ] = null;
        //
        //     return $data;
        //
        // } else {
        //     die( 'il manque l\'id' );
        // }

        if ( !isset( $_GET[ 'id' ] ) ) {
            die( 'Il manque l\'identifiant de votre livre' );
        }

        $id = intval( $_GET[ 'id' ] );
        $author = $this -> authors_model -> find( $id );
        $book = null;

        if ( isset( $_GET[ 'with' ] ) ) {
            // $with = $_GET[ 'with' ];
            // $parts = explode( ',', $with );
            $with = explode( ',', $_GET[ 'with' ] );

            if ( in_array( 'books', $with ) ) {
                $books_model = new Books();
                $books = $books_model -> getBooksByAuthorId( $author -> id );
            }
        }
var_dump( $author );
        return [
            'book' => $book,
            'view' => 'showbooks.php',
            'page_title' => 'ebooks' . $author -> name,
            'books' => $books
        ];

    }
}
