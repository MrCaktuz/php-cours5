<?php

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
        // remplacé par : $this -> authors_model ->  devant getAuthors

        $data[ 'authors' ] = $this -> authors_model -> getAuthors();
        $data[ 'view' ] = 'views/' . $GLOBALS[ 'a' ] . $GLOBALS[ 'e' ] . '.php';

        return $data;
    }

    public function show() {
        if ( isset( $_GET[ 'id' ] ) ) {
            $id = intval( $_GET[ 'id' ] ); // intval nous permet de vérifier si c'est bien un entier.
            // include( 'models/' . $GLOBALS[ 'e' ] . '.php' );
            // remplacé par : $this -> authors_model ->  devant getAuthor

            // $book = getBook( $id );
            // $view = 'views/singlebook.php'; // supprimé grace à la ligne 36, 38.
            $data[ 'author' ] = $this -> authors_model -> getAuthor( $id );
            $data[ 'view' ] = 'views/' . $GLOBALS[ 'a' ] . $GLOBALS[ 'e' ] . '.php';

            return $data;
        } else {
            die( 'il manque l\'id' );
        }
    }
}
