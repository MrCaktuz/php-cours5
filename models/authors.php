<?php
namespace Model;


// Model\Authors
class Authors extends Model
{
    protected $table = 'authors';

    public function getAuthorsByBookId( $id ) {
        $sql = 'SELECT authors.*
                FROM authors
                JOIN author_book on authors.id = author_book.author_id
                JOIN books on author_book.book_id = books.id
                WHERE books.id = :id';

        $stmnt = $this -> cn -> prepare( $sql );
        $stmnt -> execute( [ ':id' => $id ] );
        
        return $stmnt -> fetchAll();
    }
}
