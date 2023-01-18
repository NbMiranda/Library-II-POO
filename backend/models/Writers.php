<?php
include_once '../../database/Connect.php';
class Writers extends Connect{
    protected $id;
    protected $writerName;
    protected $page;

    //setters
    public function setId($id){
        $this->id = $id;
    }
    public function setWriterName($writerName){
        $this->writerName = $writerName;
    }
    public function setPage($pageCurrent){
        $this->page = $pageCurrent;
    }
    ///Getters
    public function getId(){
        return $this->id;
    }
    public function getWriterName(){
        return $this->writerName;
    }
    public function getPage(){
        return $this->page;
    }
    //Metodos (CRUD)
    public function pagination(){
        $page = (!empty($this->getPage())) ? $this->getPage() : 1;
        $pg_qty = 8;
        $start = ($pg_qty * $page) - $pg_qty;
        return $start; 
    }
    public function pageNav(){
        $i = 1;
        $count = $this->count();
        while ($count > 0) {
            if ($this->getPage() == $i) {
                echo "<span id='page-nav'><a href='writerForm?page=$i'>$i</a></span> ";
            } else {
                echo "<a href='writerForm?page=$i'>$i</a> ";
            }
            $count = $count - 8;
            $i++;
        }
        if ($this->getPage() >= $i) {
            include_once '../components/error.php';
        }
    }
    public function create(Writers $writers){
        try {
            $sql = "INSERT INTO writers (                   
                  writer_name) VALUES (:writerName)";

            $writersResult = $this->getConnection()->prepare($sql);
            $writersResult->bindValue(":writerName", $writers->getWriterName());
            
            return $writersResult->execute();
        } catch (Exception $e) {
            echo "Erro ao Inserir usuario <br>" . $e . '<br>';
        }
    }
    public function read(){
        try {
            $sql = "SELECT * FROM writers order by Writer_name asc ";
            $result = $this->getConnection()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $writersResult = array();
            foreach ($lista as $key) {
                $writersResult[] = $this->selectWriters($key);
            }
            return $writersResult;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }
    public function readLimit(){
        try {
            $start = $this->pagination();
            $sql = "SELECT * FROM writers LIMIT $start, 8 ";
            $result = $this->getConnection()->query($sql);
            // $result->bindValue(":num", $this->pagination());
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $writersResult = array();
            foreach ($lista as $key) {
                $writersResult[] = $this->selectWriters($key);
            }
            return $writersResult;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }
    public function update(Writers $writers){
        try {
            $sql = "UPDATE writers set writer_name=:writerName WHERE id = :id";
            $writersResult = $this->getConnection()->prepare($sql);
            $writersResult->bindValue(":writerName", $writers->getWriterName());
            $writersResult->bindValue(":id", $writers->getId());
            return $writersResult->execute();
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar fazer Update<br> $e <br>";
        }
    }
    public function delete(Writers $writers){
        try {
            $sql = "DELETE FROM writers WHERE id = :id";
            $writersResult = $this->getConnection()->prepare($sql);
            $writersResult->bindValue(":id", $writers->getId());
            return $writersResult->execute();
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar fazer Delete<br> $e <br>";
        }
    }
    public function selectWriters($row){
        $writer = new Writers();
        $writer->setWriterName($row['writer_name']);
        $writer->setId($row['id']);

        return $writer;
    }
    public function count(){
        $sql = "SELECT count(*) FROM writers";
        $count = $this->getConnection()->query($sql)->fetchColumn();
        return $count;
    }
}
