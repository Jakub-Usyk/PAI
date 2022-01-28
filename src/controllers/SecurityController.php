<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{
    private $cookieName;
    private UserRepository $userRepository;

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'img/jpg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';
    private CategoryController $categoryController;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->categoryController = new CategoryController();
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
        if (!$user) {
            return $this->render('login', ['messages' => ['User with such username does not exist!']]);
        }

        if (strcmp($user->getUsername(), $username) != 0 || strcmp($user->getPassword(), $password) != 0) {
            return $this->render('login', ['messages' => ['Wrong username or password!']]);
        }

        $id_user = $this->userRepository->getUserID($_POST['username']);
        if(!isset($_COOKIE[$this->cookieName])){
            setcookie('user_ID', $id_user, time() + (24*3600), "/");
            $_COOKIE['user_ID'] = $id_user;
        }

        return $this->categoryController->select_ingr();
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
            ""
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
        if (isset($_COOKIE[$this->cookieName])) {
            setcookie($this->cookieName, '', time() - (24*3600), "/");
        }
        return $this->render('login');
    }

    public function settings() {
        $userID = $_COOKIE['user_ID'];
        $user = $this->userRepository->getUserById($userID);
//        die(var_dump($user));
        $this->render('settings', ['user' => $user]);
    }

    public function change_avatar()
    {

        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__) . self::UPLOAD_DIRECTORY . $_FILES['file']['name']
            );
            $this->userRepository->changeAvatar($_FILES['file']['name']);
        }

        $userID = $_COOKIE['user_ID'];
        $user = $this->userRepository->getUserById($userID);
        $this->render('settings', ['user' => $user]);
    }

    private function validate(array $file): bool {
        if($file['size'] > self::MAX_FILE_SIZE) {
            $this->messages[] = 'File is too large for destination file system!';
            return false;
        }

        if(!isset($file['type']) && !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->messages[] = 'File type is not supported!';
            return false;
        }

        return true;
    }
}