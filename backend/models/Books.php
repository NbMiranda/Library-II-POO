<?php

class Books{
    protected $id;
    protected $bookName;
    protected $genre;
    protected $writerId;
    protected $sinopse;
    protected $otherGenre;
    protected $writerName;
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
}