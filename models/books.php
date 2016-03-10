<?php

function getBooks() {
    $booksStmnt = 'SELECT * FROM books'; // -- je défini une requete SQL
    $pdoStmnt = $GLOBALS[ 'cn' ] -> query( $booksStmnt ); // -- j'exécute la requete SDL - GLOBALS nous permet de récuperer n'importe quel variable qui n'a pas été définie dans la function.
    // var_dump( $pdoStmnt );
    // $books = $pdoStmnt -> fetchAll(); // va rechercher les données dans la BDD et les stock sous forme de tableau dans $books.
    // var_dump( $books );

    return $pdoStmnt -> fetchAll(); // -- le fetchAll nous fait un tableau d'objet  
}

function getBook( $id ) {
    $bookSql = 'SELECT * FROM books WHERE id = :id';
    $bookStmnt = $GLOBALS[ 'cn' ] -> prepare( $bookSql );
    $bookStmnt -> execute( [ 'id' => $id ] );

    return $bookStmnt -> fetch(); // je vais chercher le résultat de la requete.
}
