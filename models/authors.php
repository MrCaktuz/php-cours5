<?php

function getAuthors() {
    $authorsStmnt = 'SELECT * FROM authors';
    $pdoStmnt = $GLOBALS[ 'cn' ] -> query( $authorsStmnt ); // GLOBALS nous permet de récuperer n'importe quel variable.
    // var_dump( $pdoStmnt );
    // $books = $pdoStmnt -> fetchAll(); // va rechercher les données dans la BDD et les stock sous forme de tableau dans $books.
    // var_dump( $books );

    return $pdoStmnt -> fetchAll();
}

function getAuthor( $id ) {
    $authorSql = 'SELECT * FROM authors WHERE id = :id';
    $authorStmnt = $GLOBALS[ 'cn' ] -> prepare( $authorSql );
    $authorStmnt -> execute( [ 'id' => $id ] );

    return $authorStmnt -> fetch(); // je vais chercher le résultat de la requete.
}
