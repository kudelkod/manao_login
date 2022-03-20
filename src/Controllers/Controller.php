<?php
require ('src/Models/UserModel.php');
class Controller
{
    private $userModel;

    public function __construct(){
        $this->userModel = new UserModel();
    }

    /**
     * @param $login
     * @param $password
     * @return bool
     *
     * Метод для авторизации пользователя
     */
    public function loginUser($login, $password): bool
    {
        $user = $this->userModel->getUser($login);
        if ($user->login === $login && $user->password === $password){
            return true;
        }
        return false;
    }

    public function registerUser($parameters)
    {
        $response = [];
        if(!$this->validLogin($parameters['login'])){
            $response[] = 'Invalid login';
        }
        if(!$this->validPassword($parameters['password'])){
            $response[] = 'Invalid password';
        }
        if(!$this->uniqueLogin($parameters['login'])) {
            $response[] = 'None unique login';
        }
        if(!$this->uniqueEmail($parameters['email'])){
            $response[] = 'None unique email';
        }
        if ($parameters['password'] !== $parameters['confirmPassword']) {
            $response[] = 'Passwords do not match';
        }
        if (empty($response)){
            $salt = 'qwerty';
            $password = md5($parameters['password'].$salt);
            $parameters['password'] = $password;
            unset($parameters['confirmPassword']);
            $this->userModel->createUser($parameters);
            return true;
        }
        return $response;
    }

    public function validLogin($login): bool
    {
        if (!preg_match("~[a-zA-Z]~", $login) || strlen(($login)) < 6){
            return false;
        }
        return true;
    }
    public function validPassword($password): bool
    {
        if (!preg_match("~[a-zA-Z]+[0-9]~", $password) || strlen($password) < 6){
            return false;
        }
        return true;
    }
    public function uniqueLogin($login): bool
    {
        $logins = $this->userModel->getAllLogins();
        if(in_array($login, $logins)){
            return false;
        }
        return true;
    }
    public function uniqueEmail($email): bool
    {
        $emails = $this->userModel->getAllEmails();
        if(in_array($email, $emails)){
            return false;
        }
        return true;
    }
    public function getUser($login): UserModel
    {
        return $this->userModel->getUser($login);
    }

}