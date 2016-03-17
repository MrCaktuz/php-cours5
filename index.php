<?php

set_include_path( __DIR__ . '/controllers' . PATH_SEPARATOR . __DIR__ . '/models' . PATH_SEPARATOR . get_include_path() ); // grace à ceci, il n'y aps pas besoin de changer le chemin pour la fonction qui charge les classe automatiquement.

spl_autoload_register( function( $class ) {
    include ( $class . '.php' ); // Importe automatiquement les class dont on a besoin
} );

// echo "test";
// à chaque fois qu'on fait une requete PHP on va devoir aller dans la base de données BDD.
// Quand on travaille des objet il faut les décrire avant.

// de là
// function getCn déplacé dans le model.php
// à de là.

// Ici on est connecté à la DB ! (Data Base)

include( 'routes.php' );

// -- On découpe les requetes en une action ($a) et un sujet ($e)
// -- Ici on a mis comme comportement par défault de lister les livres ($a=index et $e=books)

//les nom des variable sont choisi en fonction de l'architecture REST
$a = isset( $_REQUEST[ 'a' ] ) ? $_REQUEST[ 'a' ] : 'index';
// ça remplace ça :
// $a = 'index';
// if ( isset( $_REQUEST[ 'a' ] ) ) {
//     $a = $_REQUEST[ 'a' ];
// }

$e = isset( $_REQUEST[ 'e' ] ) ? $_REQUEST[ 'e' ] : 'books';
//ça remplace ça :
// $e = "books";
// if ( isset( $_REQUEST[ 'e' ] ) ) {
//     $e = $_REQUEST[ 'e' ];
// }

// -- Ici on gère les possibilités de l'utilisateur. On fait en sorte de ne lui permetre que ce qu'on veut. grace à un tableau $routes
if ( !in_array( $a . '_' . $e, $routes ) ) { // On parcourt $routes pour voir si l'élément entré ne se trouve pas dans le tableau.
    die( 'cette route n\'est pas permise' );
}

// remplacé par $controller_name !
// include( 'controllers/' . $e . 'controller.php' ); // pour ne pas avoir un code kilometrique, on réutilise la variable $e pour renvoyer dans un fichier concernant ce que l'utilisateur nous a demandé.
$controller_name = ucfirst($e) . 'Controller';
$controller = new $controller_name;

$datas = call_user_func( [ $controller, $a ] ); // donne le contexte de $a grace à $controller - ici on appel la function qui correspond à l'action à exécuter ($a) (la function se trouve dans les fichiers controllers)
// -- call_user-func nous donne un tableau.
// var_dump( $datas );

// supprimé grace à la ligne 40.
// if ( isset( $_GET[ 'id' ] ) ) {
//     $id = intval( $_GET[ 'id' ] ); // intval nous permet de vérifier si c'est bien un entier.
//     $book = getBook( $id );
//     // $view = 'views/singlebook.php'; // supprimé grace à la ligne 36, 38.
// } else{
//     $books = getBooks();
//     // $view = 'views/allbooks.php'; // supprimé grace à la ligne 36, 38.
// }



// maintenant la page est connecté avec la BDD.
// probleme on peut voir nos mdp si on les met sur github... On va créer un db.ini.

// $booksStmnt = 'SELECT * FROM books';
// $pdoStmnt = $cn -> query( $booksStmnt );
// // var_dump( $pdoStmnt );
// $books = $pdoStmnt -> fetchAll(); // va rechercher les données dans la BDD et les stock sous forme de tableau dans $books.
// // var_dump( $books );

include( 'views/view.php' ); // ici on inclu la vue générique.
// foreach ( $books as $book ) {
//     echo $book -> title . '<br>';
// } // ça marche mais on préfère utiliser la syntax d'objet. Pour ça on va faire un array d'option dans le PDO


// -- la page index ne fait qu'accéder à la DB, prendre ce que l'utilisateur demander et aller chercher les fichiers en conséquence.
