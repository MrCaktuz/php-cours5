<?php
namespace Model;


// Model\Books
class Books extends Model
{
    protected $table = 'books';

    public function getBooksByAuthorId( $id ) {
        $sql = 'SELECT books.*
                FROM books
                JOIN author_book on books.id = author_book.book_id
                JOIN authors on author_book.book_id = authors.id
                WHERE books.id = :id';

        $stmnt = $this -> cn -> prepare( $sql );
        $stmnt -> execute( [ ':id' => $id ] );

        return $stmnt -> fetchAll();
    }

    public function getBooksByEditorId( $id ) {
        $sql = 'SELECT books.*
                FROM books
                JOIN editors ON editors.id = books.editor_id
                WHERE editors.id = :id';

        $stmnt = $this -> cn -> prepare( $sql );
        $stmnt -> execute( [ ':id' => $id ] );

        return $stmnt -> fetchAll();
    }
}
