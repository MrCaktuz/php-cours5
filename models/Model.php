<?php

class Model
{
    protected $table = '';
    protected $cn = '';

    public function getCn() {
        $dbConfig = parse_ini_file( 'db.ini' ); // contient les donnée qu'on ne veut pas divulger.
        // var_dump($dbConfig); // Pour voir ce qu'il y a dedans.
        $pdoOptions = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]; // les :: c'est pour les propriétés d'une class. Dans une class in y a des fonctions et des propriétés. $monPDO->$toto (pour les propriétés) pour les variable statique (qu'on ne peut utiliser que directement dnas la class) on utilise PDO::$titi

        try{ // -- On se connect à la base de donnée ici !
            $dsn = sprintf( '%s:host=%s;dbname=%s',$dbConfig[ 'driver' ], $dbConfig[ 'host' ], $dbConfig[ 'dbname' ] ); //on remplace par des joker (%s) grace à sprintf on remplace les %s par ce qu'on veut.
            $cn = new PDO( $dsn, $dbConfig[ 'username' ], $dbConfig[ 'password' ], $pdoOptions ); // On crée un objet pdo pour se connecter. Cela peut fonctionner ou pas, c'est pour ça qu'on met un try. il teste le code et si ça marche pas il renvoit une exception.
            $cn -> exec( 'SET CHARACTER SET UTF8' ); // grave à cette connection on peut faire des actions sur la base de donnée. On lui dit ici que les chaines de caractaire sont en UTF-8.
            $cn -> exec( 'SET NAMES UTF8' ); // pareil qu'au dessus.
        } catch( PDOException $e ) { // ici on récupere l'exeption dans la variable $e
            die( $e->getMessage() ); // on envoit un msessage d'error si il y a une exception.
        }
    }

    public function getRows() {
        $sql = 'SELECT * FROM ' . $this -> table; // -- je défini une requete SQL
        $stmnt = $this -> cn -> query( $sql ); // -- j'exécute la requete SDL - GLOBALS nous permet de récuperer n'importe quel variable qui n'a pas été définie dans la function.
        // var_dump( $stmnt );
        // $books = $stmnt -> fetchAll(); // va rechercher les données dans la BDD et les stock sous forme de tableau dans $books.
        // var_dump( $books );

        return $stmnt -> fetchAll(); // -- le fetchAll nous fait un tableau d'objet
    }

    public function getRow( $id ) {
        $sql = 'SELECT * FROM ' . $this -> table . ' WHERE id = :id';
        $stmnt = $this -> cn -> prepare( $sql );
        $stmnt -> execute( [ 'id' => $id ] );

        return $stmnt -> fetch(); // je vais chercher le résultat de la requete.
    }
}
