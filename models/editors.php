<?php

function getEditors()
{
    $sql = 'SELECT * FROM editors ORDER BY name';
    $pdoStmnt = $GLOBALS[ 'cn' ] -> query( $sql );

    return $pdoStmnt -> fetchAll();
}

function getEditor( $id )
{
    $sql = 'SELECT * FROM editors WHERE id = :id'; // :id = joker
    $pdoStmnt = $GLOBALS[ 'cn' ] -> prepare( $sql );
    $pdoStmnt -> execute( [ ':id' => $id ]); // pdoStmnt est modifer elle meme, pas besoin de return.

    return $pdoStmnt -> fetch();
}
