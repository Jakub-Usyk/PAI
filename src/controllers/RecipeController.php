<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Recipe.php';
require_once __DIR__.'/../repository/RecipeRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';

class RecipeController extends AppController
{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'img/jpg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];
    private RecipeRepository $recipeRepository;
    private UserRepository $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->recipeRepository = new RecipeRepository();
    }

    public function recipes() {
        $allRecipes = $this->recipeRepository->getRecipes();
        $userID = $_COOKIE['user_ID'];
        $user = $this->userRepository->getUserById($userID);
        $tab['allRecipes'] = $allRecipes;
        $tab['user'] = $user;
        $this->render('recipes', ['tab' => $tab]);
    }

    public function add_recipe() {

        if($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {

        move_uploaded_file(
            $_FILES['file']['tmp_name'],
            dirname(__DIR__) . self::UPLOAD_DIRECTORY . $_FILES['file']['name']
        );

            $recipe = new Recipe($_POST['title'], $_POST['description'], $_POST['time'], $_FILES['file']['name']);
            $this->recipeRepository->addRecipe($recipe);

            $allRecipes = $this->recipeRepository->getRecipes();
            $userID = $_COOKIE['user_ID'];
            $user = $this->userRepository->getUserById($userID);
            $tab['allRecipes'] = $allRecipes;
            $tab['user'] = $user;

            return $this->render('recipes', ['tab' => $tab]);
        }

        return $this->render('add_recipe', ['messages' => $this->messages]);
    }

    public function search() {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if($contentType === 'application/json') {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->recipeRepository->getRecipeByTitle($decoded['search']));
        }
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