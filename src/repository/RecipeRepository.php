<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Recipe.php';

class RecipeRepository extends Repository
{
    public function getRecipes()
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.recipes WHERE "ID_users" = :id
        ');

        $id = $_COOKIE['user_ID'];
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $fetchedRecipes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($fetchedRecipes == false) {
            return null;
        }

        $allRecipes = [];
        foreach ($fetchedRecipes as $recipe) {
            array_push($allRecipes, new Recipe(
                $recipe['title'],
                $recipe['description'],
                $recipe['prepare_time'],
                $recipe['image']
            ));
        }

        return $allRecipes;
    }

    public function addRecipe(Recipe $recipe): void {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.recipes (title, description, prepare_time, "ID_users", image)
            VALUES (?, ?, ?, ?, ?)
        ');


        $userID = $_COOKIE['user_ID'];
        $stmt->execute([
            $recipe->getTitle(),
            $recipe->getDescription(),
            $recipe->getPrepareTime(),
            $userID,
            $recipe->getImage()
        ]);
    }
}