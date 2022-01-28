<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Category.php';

class CategoryRepository extends Repository
{
    public function getPreDefCategories() {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."preDef_categories"
        ');

        $stmt->execute();

        $fetchedCategories = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($fetchedCategories == false) {
            return null;
        }

        $allCategories = [];
        foreach ($fetchedCategories as $category) {
            $stmt = $this->database->connect()->prepare('
            SELECT name FROM public."preDef_ingredients" WHERE "ID_preDef_categories" = :id
        ');

            $id = $this->getPreDefCategoryID($category);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $fetchedIngredients = $stmt->fetchAll(PDO::FETCH_COLUMN);

            array_push($allCategories, new Category(
                $category['name'],
                $category['icon'],
                $fetchedIngredients
            ));
        }
        return $allCategories;
    }

    private function getPreDefCategoryID($category) {
        $stmt = $this->database->connect()->prepare('
            SELECT "ID_preDef_categories" FROM public."preDef_categories" WHERE "preDef_categories".name = :name
        ');

//        die(var_dump($category['name']));
        $stmt->bindParam(':name', $category['name'], PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_COLUMN);
    }
}