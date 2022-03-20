<?php
require ('src/CRUD/CRUD.php');
class UserModel
{
    private $c;
    public $name;
    public $login;
    public $password;
    public $email;

    public function __construct(){
        $this->c = new CRUD();
    }

    public function getUser($login){
        $data = $this->c->read();
        foreach ($data as $user) {
            foreach ($user as $parameter => $value){
                if($parameter === 'login' && $value === $login){
                    $this->name = $user['name'];
                    $this->login = $user['login'];
                    $this->password = $user['password'];
                    $this->email = $user['email'];
                }
            }
        }
        return $this;
    }
    public function createUser($parameters){
        $this->c->create($parameters);
        return true;
    }
    public function getAllLogins(){
        $data = $this->c->read();
        foreach ($data as $user){
            foreach ($user as $key => $value){
                if ($key === 'login'){
                    $logins[] = $value;
                }
            }
        }

        return $logins;
    }
    public function getAllEmails(){
        $data = $this->c->read();
        foreach ($data as $user){
            foreach ($user as $key => $value){
                if ($key === 'email'){
                    $emails[] = $value;
                }
            }
        }

        return $emails;
    }
}