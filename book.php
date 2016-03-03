<?php

function getBooks() {
    $booksStmnt = 'SELECT * FROM books';
    $pdoStmnt = $GLOBALS[ 'cn' ] -> query( $booksStmnt ); // GLOBALS nous permet de récuperer n'importe quel variable.
    // var_dump( $pdoStmnt );
    $books = $pdoStmnt -> fetchAll(); // va rechercher les données dans la BDD et les stock sous forme de tableau dans $books.
    // var_dump( $books );

    return $books;
}

function getBook( $id ) {
    $bookSql = 'SELECT * FROM books WHERE id = :id';
    $bookStmnt = $GLOBALS[ 'cn' ] -> prepare( $bookSql );
    $bookStmnt -> execute( [ 'id' => $_GET[ 'id' ] ] );

    return $bookStmnt -> fetch(); // je vais chercher le résultat de la requete.
}
