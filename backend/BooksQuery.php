<?php

class BooksQuery{
    protected $page;
    protected $inputPost;
    public function setInputPost($inputPost){
        $this->inputPost = $inputPost;
    }
    public function getInputPost(){
        return $this->inputPost;
    }
    //Pagination
    public function setPage($pageCurrent){
        $this->page = $pageCurrent;
    }
    public function getPage(){
        return $this->page;
    }
    public function pagination(){
        $page = (!empty($this->getPage())) ? $this->getPage() : 1;
        $pg_qty = 10;
        $start = ($pg_qty * $page) - $pg_qty;
        return $start; 
    }
    public function pageNav(){
        $i = 1;
        $count = $this->count();
        while ($count > 0) {
            if ($this->getPage() == $i) {
                echo "<span id='page-nav'><a href='cadastros?page=$i'>$i</a></span> ";
            } else {
                echo "<a href='cadastros?page=$i'>$i</a> ";
            }
            $count = $count - 10;
            $i++;
        }
        if ($this->getPage() >= $i) {
            include_once '../components/error.php';
        }
    }
    //CRUD
    public function create(Books $books){
        try {
            $sql = "INSERT INTO books (                   
                  book_name, genre, writer_id, sinopse, other_genre) 
                  VALUES (:bookName, :genre, :writerId, :sinopse, :otherGenre )";

            $booksResult = Connect::getConnection()->prepare($sql);
            $booksResult->bindValue(":bookName", $books->getBookName());
            $booksResult->bindValue(":genre", $books->getGenre());
            $booksResult->bindValue(":writerId", $books->getWriterId());
            $booksResult->bindValue(":sinopse", $books->getSinopse());
            $booksResult->bindValue(":otherGenre", $books->getOtherGenre());
            
            return $booksResult->execute();
        } catch (Exception $e) {
            print "Erro ao Inserir Livro <br>" . $e . '<br>';
        }
    }
    public function read(){
        try {
            $sql = "SELECT b.id, b.book_name, b.genre, b.other_genre, b.sinopse, w.writer_name 
                FROM books as b, writers as w WHERE w.id = b.writer_id ORDER BY book_name asc ";

            $result = Connect::getConnection()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $booksResult = array();
            foreach ($lista as $key) {
                $booksResult[] = $this->selectBooks($key);
            }
            return $booksResult;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar buscar todos os livros." . $e;
        }
    }
    public function update(Books $books){
        try {
            $sql = "UPDATE books SET book_name=:bookName, genre=:genre, 
            other_genre=:otherGenre, sinopse=:sinopse, writer_id=:writerId 
            WHERE id=:id";

            $booksResult = Connect::getConnection()->prepare($sql);
            $booksResult->bindValue(":bookName", $books->getBookName());
            $booksResult->bindValue(":genre", $books->getGenre());
            $booksResult->bindValue(":otherGenre", $books->getOtherGenre());
            $booksResult->bindValue(":sinopse", $books->getSinopse());
            $booksResult->bindValue(":writerId", $books->getWriterId());
            $booksResult->bindValue(":id", $books->getId());
            return $booksResult->execute();
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar fazer Update do livro<br> $e <br>";
        }
    }
    public function delete(Books $books){
        try {
            $sql = "DELETE FROM books WHERE id = :id";
            $booksResult = Connect::getConnection()->prepare($sql);
            $booksResult->bindValue(":id", $books->getId());
            return $booksResult->execute();
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar fazer Delete<br> $e <br>";
        }
    }
    public function selectBooks($row){
        $books = new Books();
        $books->setId($row['id']);
        $books->setBookName($row['book_name']);
        $books->setGenre($row['genre']);
        $books->setOtherGenre($row['other_genre']);
        $books->setSinopse($row['sinopse']);
        $books->setWriterId($row['writer_id']);
        $books->setWriterName($row['writer_name']);

        return $books;
    }
    public function readLimit(){
        try {
            $start = $this->pagination();
            $sql = "SELECT b.id, b.book_name, b.genre, b.other_genre, b.sinopse, w.writer_name 
            FROM books as b, writers as w WHERE w.id = b.writer_id ORDER BY book_name asc LIMIT $start, 10 ";
            $result = Connect::getConnection()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $booksResult = array();
            foreach ($lista as $key) {
                $booksResult[] = $this->selectBooks($key);
            }
            return $booksResult;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }

    public function readOne(){
        $id = $this->getInputPost();
        $sql = "SELECT * FROM books WHERE id = '$id'";

        $result = Connect::getConnection()->prepare($sql);
        $result->execute(array());
        $booksResult = $result->fetchAll();
        return $booksResult;
    }
    public function selectOneBook($row){
        $books = new Books();
        $books->setId($row['id']);
        $books->setBookName($row['book_name']);
        $books->setGenre($row['genre']);
        $books->setOtherGenre($row['other_genre']);
        $books->setSinopse($row['sinopse']);
        $books->setWriterId($row['writer_id']);
        return $books;
    }
    public function count(){
        $sql = "SELECT count(*) FROM books";
        $count = Connect::getConnection()->query($sql)->fetchColumn();
        return $count;
    }
}