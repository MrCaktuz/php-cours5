<?php

// Un controller c'est quelque chose qui controle ce que l'uitilisateur veut/donne et produit les donné qui vont etre renvoyer dans les views et dont quel view va etre utilisé.


//  else{
//     $books = getBooks();
//     // $view = 'views/allbooks.php'; // supprimé grace à la ligne 36, 38.
// }

function index() {
    include( $GLOBALS[ 'e' ] . '.php' );
    $data[ 'books' ] = call_user_func( $GLOBALS[ 'a' ] );
    $data[ 'view' ] = 'view/' . $GLOBALS[ 'a' ] . $GLOBALS[ 'e' ] . '.php';
}

function show() {
    if ( isset( $_GET[ 'id' ] ) ) {
        $id = intval( $_GET[ 'id' ] ); // intval nous permet de vérifier si c'est bien un entier.
        include( $GLOBALS[ 'e' ] . '.php' );
        // $book = getBook( $id );
        // $view = 'views/singlebook.php'; // supprimé grace à la ligne 36, 38.
        $data[ 'books' ] = call_user_func( $GLOBALS[ 'a' ], $id );
        $data[ 'view' ] = 'view/' . $GLOBALS[ 'a' ] . $GLOBALS[ 'e' ] . '.php';
    } else {
        die( 'il manque l\'id' );
    }
}
