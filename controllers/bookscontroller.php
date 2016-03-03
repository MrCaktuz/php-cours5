<?php

// Un controller c'est quelque chose qui controle ce que l'uitilisateur veut/donne et produit les donné qui vont etre renvoyer dans les views et dont quel view va etre utilisé.


//  else{
//     $books = getBooks();
//     // $view = 'views/allbooks.php'; // supprimé grace à la ligne 36, 38.
// }

function index() {
    include( 'models/' . $GLOBALS[ 'e' ] . '.php' );
    $data[ 'books' ] = getBooks();
    $data[ 'view' ] = 'views/' . $GLOBALS[ 'a' ] . $GLOBALS[ 'e' ] . '.php';

    return $data;
}

function show() {
    if ( isset( $_GET[ 'id' ] ) ) {
        $id = intval( $_GET[ 'id' ] ); // intval nous permet de vérifier si c'est bien un entier.
        include( 'models/' . $GLOBALS[ 'e' ] . '.php' );
        // $book = getBook( $id );
        // $view = 'views/singlebook.php'; // supprimé grace à la ligne 36, 38.
        $data[ 'book' ] = getBook( $id );
        $data[ 'view' ] = 'views/' . $GLOBALS[ 'a' ] . $GLOBALS[ 'e' ] . '.php';

        return $data;
    } else {
        die( 'il manque l\'id' );
    }
}
