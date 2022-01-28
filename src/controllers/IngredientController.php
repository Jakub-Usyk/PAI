<?php

require_once 'AppController.php';

class IngredientController extends AppController
{
    private UserRepository $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function select_ingr() {
        $userID = $_COOKIE['user_ID'];
        $user = $this->userRepository->getUserById($userID);
//        die(var_dump($user));
        $this->render('select_ingr', ['user' => $user]);
    }
}