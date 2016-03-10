<?php

class Model
{
    protected $table = '';
    protected $cn = '';

    public function getRows() {
        $sql = 'SELECT * FROM ' . $this -> table; // -- je défini une requete SQL
        $stmnt = $GLOBALS[ 'cn' ] -> query( $sql ); // -- j'exécute la requete SDL - GLOBALS nous permet de récuperer n'importe quel variable qui n'a pas été définie dans la function.
        // var_dump( $stmnt );
        // $books = $stmnt -> fetchAll(); // va rechercher les données dans la BDD et les stock sous forme de tableau dans $books.
        // var_dump( $books );

        return $stmnt -> fetchAll(); // -- le fetchAll nous fait un tableau d'objet
    }

    public function getRow( $id ) {
        $sql = 'SELECT * FROM ' . $this -> table . ' WHERE id = :id';
        $stmnt = $GLOBALS[ 'cn' ] -> prepare( $sql );
        $stmnt -> execute( [ 'id' => $id ] );

        return $stmnt -> fetch(); // je vais chercher le résultat de la requete.
    }
}
