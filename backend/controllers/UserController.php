<?php
session_start();
require_once "../models/Users.php";
class UserController {
    protected $post;
    public function setPost($post){
        $this->post = $post;
    }
    public function getPost(){
        return $this->post;
    }

    public function login(){
        $user = new User;
        $postResult = $this->getPost();
        $user->setEmail($postResult['email']);
        $user->setUserPassword($postResult['password']);
    
        $result = $user->read();
        
        if ($result) {
            $_SESSION['logged'] = true ;
            header("Location: ../../frontend/page/livros");
            die();
        }else {
            $_SESSION['message'] = "<span style='color: red;'>Erro! usuario ou senha invalida<br></span>";
            header("Location: ../../frontend/page/login");
            die();
        }
        }
        public function register(){
            $user = new User;
            $postResult = $this->getPost();
            $user->setUserName($postResult['userName']);
            $user->setEmail($postResult['email']);
            $user->setUserPassword($postResult['password']);
            $user->setPhoneNumber($postResult['phoneNumber']);
            $user->create();
            
            header("Location: ../../frontend/page/login");
            die();
        }
        public function logout(){
            unset($_SESSION['logged']);
            header("Location: ../../frontend/page/login");
            die();
        }
}