<?php
namespace Model;


// Model\Editors
class Editors extends Model
{
    protected $table = 'editors';

    public function getEditorsByBookId( $id ) {
        $sql = 'SELECT editors.*
        FROM editors
        JOIN books on books.editor_id = editors.id 
        WHERE books.id = :id';

        $stmnt = $this -> cn -> prepare( $sql );
        $stmnt -> execute( [ ':id' => $id ] );

        return $stmnt -> fetchAll();
    }

    public function getEditorsByAuthorId( $id ) {
        $sql = 'SELECT editors.*
                FROM editors
                JOIN books on books.editor_id = editors.id
                JOIN author_book ON author_book.book_id = books.id
                JOIN authors ON author_book.author_id = authors.id
                WHERE authors.id = :id';

        $stmnt = $this -> cn -> prepare( $sql );
        $stmnt -> execute( [ ':id' => $id ] );

        return $stmnt -> fetchAll();
    }
}
