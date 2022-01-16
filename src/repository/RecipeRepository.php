<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Recipe.php';

class RecipeRepository extends Repository
{
    public function getRecipe(int $id): ?Recipe
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.recipes WHERE id = :id
        ');

        $stmt->bindParam(':username', $id, PDO::PARAM_INT);
        $stmt->execute();

        $recipe = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($recipe == false) {
            return null;
        }

        return new Recipe(
            $recipe['title'],
            $recipe['description'],
            $recipe['prepareTime'],
            $recipe['image']
        );
    }

    public function addRecipe(Recipe $recipe): void {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.recipes (title, description, prepare_time, "ID_users", image)
            VALUES (?, ?, ?, ?, ?)
        ');

        $userID = 1;
        $stmt->execute([
            $recipe->getTitle(),
            $recipe->getDescription(),
            $recipe->getPrepareTime(),
            $userID,
            $recipe->getImage()
        ]);
    }
}