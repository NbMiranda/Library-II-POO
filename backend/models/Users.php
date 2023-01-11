<?php

Class User{
    protected $id;
    protected $userName;
    private $email;
    private $userPassword;
    protected $phoneNumber;

    //Setter
    public function setId($id){
        $this->id = $id;
    }
    public function setUserName($userName){
        $this->userName = $userName;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setUserPassword($userPassword){
        $this->userPassword = $userPassword;
    }
    public function setPhoneNumber($phoneNumber){
        $this->phoneNumber = $phoneNumber;
    }
    //Getters
    public function getId(){
        return $this->id;
    }
    public function getUserName(){
        return $this->userName;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getUserPassword(){
        return $this->userPassword;
    }
    public function getPhoneNumber(){
        return $this->phoneNumber;
    }
    //Create user
    public function create(){
        try {
            $sql = "INSERT INTO users (                   
                  user_name, email, user_password,) VALUES (:username,
                  :email, :userPassword)";

            $userResult = UserConnect::getConnection()->prepare($sql);
            $userResult->bindValue(":userName", $this->getUserName());
            $userResult->bindValue(":email", $this->getEmail());
            
            return $userResult->execute();
        } catch (Exception $e) {
            print "Erro ao Inserir usuario <br>" . $e . '<br>';
        }
    }
}