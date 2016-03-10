<?php

class Model
{
    protected $table = '';
    protecter $cn = null;

    public function getRaws() {
        $sql = 'SELECT * FROM ' . $this -> table; // -- je défini une requete SQL
        $pdoStmnt = $GLOBALS[ 'cn' ] -> query( $sql ); // -- j'exécute la requete SDL - GLOBALS nous permet de récuperer n'importe quel variable qui n'a pas été définie dans la function.
        // var_dump( $pdoStmnt );
        // $books = $pdoStmnt -> fetchAll(); // va rechercher les données dans la BDD et les stock sous forme de tableau dans $books.
        // var_dump( $books );

        return $pdoStmnt -> fetchAll(); // -- le fetchAll nous fait un tableau d'objet
    }

    public function getRaw( $id ) {
        $Sql = 'SELECT * FROM ' . $this -> table . ' WHERE id = :id';
        $Stmnt = $GLOBALS[ 'cn' ] -> prepare( $sql );
        $Stmnt -> execute( [ 'id' => $id ] );

        return $Stmnt -> fetch(); // je vais chercher le résultat de la requete.
    }
}
