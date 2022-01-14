<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{
    public function login() {
        $userRepository = new UserRepository();

        if(!$this->isPost()) {
            return $this->render('login');
        }

        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = $userRepository->getUser($username);
//        die($username . " + " . $password . "\n" . $user->getUsername() . " + " . $user->getPassword());
        if (!$user) {
            return $this->render('login', ['messages' => ['User with such username does not exist!']]);
        }

        if (strcmp($user->getPassword(), $password) != 0 && strcmp($user->getUsername(), $username) != 0) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        return $this->render('select_ingr');
    }
}