<?php
$booksStmnt = 'SELECT * FROM books';
$pdoStmnt = $cn -> query( $booksStmnt );
// var_dump( $pdoStmnt );
$books = $pdoStmnt -> fetchAll(); // va rechercher les données dans la BDD et les stock sous forme de tableau dans $books.
// var_dump( $books );
