<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/CategoryRepository.php';

class CategoryController extends AppController
{
    private UserRepository $userRepository;
    private CategoryRepository $categoryRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->categoryRepository = new CategoryRepository();
    }

    public function select_ingr() {
        $userID = $_COOKIE['user_ID'];
        $user = $this->userRepository->getUserById($userID);
        $allCategories = $this->categoryRepository->getPreDefCategories();
        $tab['allCategories'] = $allCategories;
        $tab['user'] = $user;
        $this->render('select_ingr', ['tab' => $tab]);
    }
}