<?php
// echo "test";
// à chaque fois qu'on fait une requete PHP on va devoir aller dans la base de données BDD.
// Quand on travaille des objet il faut les décrire avant.

$dbConfig = parse_ini_file( 'db.ini' );
//var_dump($dbConfig); // Pour voir ce qu'il y a dedans.
$pdoOptions = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]; // les :: c'est pour les propriétés d'une class. Dans une class in y a des fonctions et des propriétés. $monPDO->$toto (pour les propriétés) pour les variable statique (qu'on ne peut utiliser que directement dnas la class) on utilise PDO::$titi

try{
    $dsn = sprintf( '%s:host=%s;dbname=%s',$dbConfig[ 'driver' ], $dbConfig[ 'host' ], $dbConfig[ 'dbname' ] ); //on remplace par des joker (%s) grace à sprintf on remplace les %s par ce qu'on veut.
    $cn = new PDO( $dsn, $dbConfig[ 'username' ], $dbConfig[ 'password' ], $pdoOptions );
    $cn -> query( 'SET CHARACTER SET UTF8' );
    $cn -> query( 'SET NAMES UTF8' );
} catch( PDOException $e ) {
    echo $e->getMessage();
}

include( 'book.php' );

if ( isset( $_GET[ 'id' ] ) ) {
    $id = intval( $_GET[ 'id' ] ); // intval nous permet de vérifier si c'est bien un entier.
    $book = getBook( $id );
    $view = 'singlebook.php';
} else{
    $books = getBooks();
    $view = 'allbooks.php';
}

// maintenant la page est connecté avec la BDD.
// probleme on peut voir nos mdp si on les met sur github... On va créer un db.ini.

// $booksStmnt = 'SELECT * FROM books';
// $pdoStmnt = $cn -> query( $booksStmnt );
// // var_dump( $pdoStmnt );
// $books = $pdoStmnt -> fetchAll(); // va rechercher les données dans la BDD et les stock sous forme de tableau dans $books.
// // var_dump( $books );

include( 'view.php' );
// foreach ( $books as $book ) {
//     echo $book -> title . '<br>';
// } // ça marche mais on préfère utiliser la syntax d'objet. Pour ça on va faire un array d'option dans le PDO
