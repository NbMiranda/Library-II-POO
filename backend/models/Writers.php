<?php

class Writers{
    protected $id;
    protected $writerName;

    //setters
    public function setId($id){
        $this->id = $id;
    }
    public function setWriterName($writerName){
        $this->writerName = $writerName;
    }
    ///Getters
    public function getId(){
        return $this->id;
    }
    public function getWriterName(){
        return $this->writerName;
    }
 
}