<?php
include_once("../../database/UserConnect.php");
Class User extends UserConnect{
    protected $id;
    protected $userName;
    private $email;
    private $userPassword;
    protected $phoneNumber;

    //Setters
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
    public function create(User $user){
        try {
            $sql = "INSERT INTO users (`user_name`, `email`, `user_password`) 
            VALUES (:userName, :email, :userPassword)";

            $userResult = $this->getConnection()->prepare($sql);

            $userResult->bindValue(":userName", $user->getUserName());
            $userResult->bindValue(":email", $user->getEmail());
            $userResult->bindValue(":userPassword", $user->getUserPassword());
            
            return $userResult->execute();
        } catch (Exception $e) {
            echo "Erro ao Inserir usuario <br>" . $e . '<br>';
        }
    }
    //Read
    public function read(){
        try {
            $sql = "SELECT * FROM users where email = :email ";
                        
            $userResult = $this->getConnection()->prepare($sql);
            $userResult->bindValue(":email", $this->getEmail());
            $userResult->execute();
            $result = $userResult->fetchAll();

            if ($result[0]['user_password'] == $this->getUserPassword()) {
                return $result;
            }else {
                return false;
            }            
        } catch (Exception $e) {
            echo "Erro ao Inserir usuario <br>" . $e . '<br>';
        }
    }

}