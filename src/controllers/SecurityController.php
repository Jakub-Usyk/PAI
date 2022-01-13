<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';

class SecurityController extends AppController
{
    public function login() {
        $user = new User( 'Johnny', 'admin', 'jsnow@pk.edu.pl', 'John', 'Snow');

        if(!$this->isPost()) {
            return $this->login('login');
        }

        $username = $_POST["username"];
        $password = $_POST["password"];

        if ($user->getUsername() !== $username) {
            return $this->render('login', ['messages' => ['User with such username does not exist!']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        return $this->render('select_ingr');
    }
}