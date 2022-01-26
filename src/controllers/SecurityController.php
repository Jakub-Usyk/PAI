<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{
    private $cookieName;
    private UserRepository $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->cookieName = 'user_ID';
    }

    public function login() {

        if(!$this->isPost()) {
            return $this->render('login');
        }

        $salt = $this->userRepository->getUserSalt($_POST['username']);
        $username = $_POST['username'];
        $password = md5($_POST['password'] . $salt);

        $user = $this->userRepository->getUser($username);
//        die($username . " + " . $password . "\n" . $user->getUsername() . " + " . $user->getPassword());
        if (!$user) {
            return $this->render('login', ['messages' => ['User with such username does not exist!']]);
        }

        if (strcmp($user->getUsername(), $username) != 0 || strcmp($user->getPassword(), $password) != 0) {
            return $this->render('login', ['messages' => ['Wrong username or password!']]);
        }

        $id_user = $this->userRepository->getUserID($_POST['username']);

        if(!isset($_COOKIE[$this->cookieName])){
            setCookie($this->cookieName, $id_user, time() + (24*3600), "/");
        }

        return $this->render('select_ingr');
    }

    public function new_account() {
        if(!$this->isPost()) {
            return $this->render('new_account');
        }

        if($_POST['password'] != $_POST['password_retype']) {
            return $this->render('new_account', ['messages' => ['Passwords don\'t match!']]);
        }

        $salt = md5(rand(0, 1024));
        $password = md5($_POST['password'] . $salt);

        $user = new User(
            $_POST['username'],
            $password,
            $_POST['email'],
            "",
            "",
            $salt
        );

        $message = $this->userRepository->addUser($user, $salt);

        if($message == "User already exists!") {
            return $this->render('new_account', ['messages' => [$message]]);
        }

        if($message == "Wrong username!") {
            return $this->render('new_account', ['messages' => [$message]]);
        }


        return $this->render('login', ['messages' => [$message]]);
    }

    public function logout()
    {
        if (isset($_COOKIE['user_ID'])) {
            setcookie('user_ID', '', time() - (24*3600), "/");
        }
        return $this->render('login');
    }
}