<?php
// echo "test";
// à chaque fois qu'on fait une requete PHP on va devoir aller dans la base de données BDD.
// Quand on travaille des objet il faut les décrire avant.

$dbConfig = parse_ini_file( 'db.ini' );
//var_dump($dbConfig); // Pour voir ce qu'il y a dedans.

try{
    $dsn = sprintf( '%s:host=%s;dbname=%s',$dbConfig[ 'driver' ], $dbConfig[ 'host' ], $dbConfig[ 'dbname' ] ); //on remplace par des joker (%s) grace à sprintf on remplace les %s par ce qu'on veut.
    $cn = new PDO( $dsn, $dbConfig[ 'username' ], $dbConfig[ 'password' ] );
    $cn -> query( 'SET CHARCTER SET UTF8' );
    $cn -> query( 'SET NAMES UTF8' );
} catch( PDOException $e ) {
    echo $e->getMessage();
}
// maintenant la page est connecté avec la BDD.
// probleme on peut voir nos mdp si on les met sur github... On va créer un db.ini.


$booksStmnt = 'SELECT * FROM books';
$pdoStmnt = $cn -> query( $booksStmnt );
// var_dump( $pdoStmnt );
$books = $pdoStmnt -> fetchAll(); // va rechercher les données dans la BDD et les stock sous forme de tableau dans $books.
// var_dump( $books );

foreach ( $books as $book ) {
    echo $book[ 'title' ]. '<br>';
}
