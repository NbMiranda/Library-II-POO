<?php
include_once '../../database/Connect.php';
class Books extends Connect {
    protected $id;
    protected $bookName;
    protected $genre;
    protected $writerId;
    protected $sinopse;
    protected $otherGenre;
    protected $writerName;
    public $bookCover;

    protected $page;
    protected $inputPost;
    //Função de gêneros
    public static function genres(){
        $genres = array('Acao e aventura', 'Biografia', 'Drama', 'Ficcao', 'Terror',
         'Humor', 'Infantil', 'Romance', 'Religioso');
        return $genres;
    }
    //Setters
    public function setId($id){
        $this->id = $id;
    }    
    public function setBookName($bookName){
        $this->bookName = $bookName;
    }
    public function setGenre($genre){
        $this->genre = $genre;
    }    
    public function setWriterId($writerId){
        $this->writerId = $writerId;
    }    
    public function setSinopse($sinopse){
        $this->sinopse = $sinopse;
    }
    public function setOtherGenre($otherGenre){
        $this->otherGenre = $otherGenre;
    }
    public function setWriterName($writerName){
        $this->writerName = $writerName;
    }

    public function setInputPost($inputPost){
        $this->inputPost = $inputPost;
    }
    public function setPage($pageCurrent){
        $this->page = $pageCurrent;
    }
    public function setBookCover($img){
        $this->bookCover = $img;
    }
    //Getters    
    public function getId(){
        return $this->id;
    }    
    public function getBookName(){
        return $this->bookName;        
    }
    public function getGenre(){
        return $this->genre;
    }    
    public function getWriterId(){
        return $this->writerId;
    }    
    public function getSinopse(){
        return $this->sinopse;
    }
    public function getOtherGenre(){
        return $this->otherGenre;
    }
    public function getWriterName(){
        return $this->writerName;
    }

    public function getInputPost(){
        return $this->inputPost;
    }
    public function getPage(){
        return $this->page;
    }
    public function getBookCover(){
        return $this->bookCover;
    }
    //Metodos (CRUD)
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


    public function create(Books $books){
        try {
            $sql = "INSERT INTO books (                   
                  book_name, genre, writer_id, sinopse, other_genre, book_cover) 
                  VALUES (:bookName, :genre, :writerId, :sinopse, :otherGenre, :bookCover )";

            $booksResult = $this->getConnection()->prepare($sql);
            $booksResult->bindValue(":bookName", $books->getBookName());
            $booksResult->bindValue(":genre", $books->getGenre());
            $booksResult->bindValue(":writerId", $books->getWriterId());
            $booksResult->bindValue(":sinopse", $books->getSinopse());
            $booksResult->bindValue(":otherGenre", $books->getOtherGenre());
            $booksResult->bindValue(":bookCover", $books->getBookCover());
            
            return $booksResult->execute();
        } catch (Exception $e) {
            echo "Erro ao Inserir Livro <br>" . $e . '<br>';
        }
    }
    public function read(){
        try {
            $sql = "SELECT b.id, b.book_name, b.genre, b.other_genre, b.sinopse, b.book_cover, 
            w.writer_name FROM books as b, writers as w WHERE w.id = b.writer_id ORDER BY book_name ASC";

            $result = $this->getConnection()->query($sql);
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

            $booksResult = $this->getConnection()->prepare($sql);
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
            $booksResult = $this->getConnection()->prepare($sql);
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
        $books->setBookCover($row['book_cover']);
        $books->setWriterId($row['writer_id']);
        $books->setWriterName($row['writer_name']);

        return $books;
    }
    public function updateCover(Books $books){
        try {
            $sql = "UPDATE books SET book_cover=:bookCover WHERE id=:id";

            $booksResult = $this->getConnection()->prepare($sql);
            $booksResult->bindValue(":bookCover", $books->getBookCover());
            $booksResult->bindValue(":id", $books->getId());
            
            return $booksResult->execute();
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar fazer Update da capa livro<br> $e <br>";
        }
    }
    
    public function readLimit(){
        try {
            $start = $this->pagination();
            $sql = "SELECT b.id, b.book_name, b.genre, b.other_genre, b.sinopse, w.writer_name 
            FROM books as b, writers as w WHERE w.id = b.writer_id ORDER BY book_name asc LIMIT $start, 10 ";
            $result = $this->getConnection()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $booksResult = array();
            foreach ($lista as $key) {
                $booksResult[] = $this->selectBooks($key);
            }
            return $booksResult;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }

    public function readOne(){
        $id = $this->getInputPost();
        $sql = "SELECT * FROM books WHERE id = '$id'";

        $result = $this->getConnection()->prepare($sql);
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
        $count = $this->getConnection()->query($sql)->fetchColumn();
        return $count;
    }
    public function selectLike($searchBook){
        try {
            $sql = "SELECT * FROM books WHERE book_name like '%$searchBook%'";
            $sqlSearch = $this->getConnection()->prepare($sql);
            $sqlSearch->execute(array());
            $resultSearch = $sqlSearch->fetchAll(PDO::FETCH_ASSOC);
            return $resultSearch;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao Buscar os livros." . $e;
        }

    }
    public function readLastNine(){
        try {
            $sql = "SELECT b.id, b.book_name, b.genre, b.other_genre, b.sinopse, b.book_cover, 
            w.writer_name FROM books as b, writers as w WHERE w.id = b.writer_id ORDER BY ID DESC LIMIT 9";
            $result = $this->getConnection()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $booksResult = array();
            foreach ($lista as $key) {
                $booksResult[] = $this->selectBooks($key);
            }
            return $booksResult;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }
}