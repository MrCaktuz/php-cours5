<?php
namespace Controller;

use Model\Books;

class BooksController // On le met dans une classe pour passer a une méthode object.
{
    private $books_model = null;

    public function __construct() // function qui s'exe quand on fait le new.
    {
        $this -> books_model = new Books; // On le rajoute avant getBooks
    }

    // Un controller c'est quelque chose qui controle ce que l'uitilisateur veut/donne et produit les donné qui vont etre renvoyer dans les views et dont quel view va etre utilisé.


    //  else{
    //     $books = getBooks();
    //     // $view = 'views/allbooks.php'; // supprimé grace à la ligne 36, 38.
    // }

    public function index() {
        // include( 'models/' . $GLOBALS[ 'e' ] . '.php' ); // -- pourquoi $GLOBALS[ 'e' ] => parce que c'est pas comme ne JS, une variable global ne peux pas etre utiliser dans une fonction. il faut mettre $GLOBALS[...] pour qu'il aille chercher la variable global en dehors de la fonction.
        // remplacé par : $this -> books_model -> avant all

        $data[ 'books' ] = $this -> books_model -> all(); // renvoi vers la function du model books
        $data[ 'view' ] = 'views/' . $GLOBALS[ 'a' ] . $GLOBALS[ 'e' ] . '.php'; // correspond à : $data['view'] = 'views/indexbooks.php'

        return $data;
    }

    public function show() {
        if ( isset( $_GET[ 'id' ] ) ) {
            $id = intval( $_GET[ 'id' ] ); // intval nous permet de vérifier si c'est bien un entier.
            // include( 'models/' . $GLOBALS[ 'e' ] . '.php' );
            // remplacé par $this -> books_model -> devant find.

            // $book = getBook( $id );
            // $view = 'views/singlebook.php'; // supprimé grace à la ligne 36, 38.
            $data[ 'book' ] = $this -> books_model -> find( $id );
            $data[ 'view' ] = 'views/' . $GLOBALS[ 'a' ] . $GLOBALS[ 'e' ] . '.php';

            return $data;
        } else {
            die( 'il manque l\'id' );
        }
    }

}
