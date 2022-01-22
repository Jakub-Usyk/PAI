<?php

require_once 'AppController.php'; 

class DefaultController extends AppController {

    public function login() {
        $this->render('login');
    }

    public function new_account() {
        $this->render('new_account');
    }

    public function recipes() {
        $this->render('recipes');
    }

    public function select_ingr() {
        $this->render('select_ingr');
    }

    public function settings() {
        $this->render('settings');
    }
}