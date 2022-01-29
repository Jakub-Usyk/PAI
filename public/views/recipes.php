<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/common2.css">
    <link rel="stylesheet" type="text/css" href="public/css/recipes.css">
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <title>recipes page</title>
</head>

<?php
if(!isset($_COOKIE['user_ID'])){
    $url = "http://$_SERVER[HTTP_HOST]";
    header("Location: {$url}/login");
}
?>

<body>
    <div class="container">
        <div class="navi-bar">
            <a class="avatar" href="settings">
<!--                --><?php //die(var_dump($tab)) ?>
                <?php if ($tab['user']->getAvatar() == "")
                    echo "<img class=\"placeholder\" src=\"public/img/new-avatar.svg\">";
                else
                    echo "<img class=\"photo\" src=\"public/uploads/".$tab['user']->getAvatar()."\">";
                ?>
            </a>
            <a class="ingr-select" href="select_ingr">
                <img class="ingr-icon" src="public/img/ingredients.svg"></img>
                <div class="text">Select ingredients</div>
            </a>
            <a class="recipes1" href="recipes">
                <img class="recipes-icon" src="public/img/recipes.svg"></img>
                <div class="text">My recipes</div>
            </a>
            <a class="settings" href="settings">
                <img class="settings-icon" src="public/img/settings.svg"></img>
                <div class="text">Settings</div>
            </a>
            <form class="logout-form" action="logout" method="POST">
                <button class="logout" type="submit">
                    <img class="logout-icon" src="public/img/logout.svg"></img>
                    <div class="text">Logout</div>
                </button>
            </form>
        </div>
        <div class="main-panel">
            <div class="search-bar">
                <img class="icon" src="public/img/search.svg">
                <input name="search" type="text" placeholder="SEARCH FOR RECIPE..."/>
            </div>
            <div class="parting"></div>
            <div class="recipes">
<!--                --><?php //die(var_dump($tab)) ?>
                <?php if($tab['allRecipes'] != null) foreach ($tab['allRecipes'] as $recipe): ?>
                    <button class="recipe">
                        <img class="photo" src="public/uploads/<?= $recipe->getImage() ?>">
                        <div class="description">
                            <div class="heading">
                                <div class="title"><?= $recipe->getTitle() ?></div>
                                <img class="time" src="public/img/clock.svg">
                                <div class="text"><?= $recipe->getPrepareTime() ?> minutes</div>
                            </div>
                            <div class="body">
                                <div class="used-ingredients">
                                    <div class="text">Ingredients:</div>
                                    <div class="ingredient">
                                        <div class="name">not yet set</div>
                                    </div>
                                    <div class="ingredient">
                                        <div class="name">not yet set</div>
                                    </div>
                                    <div class="ingredient">
                                        <div class="name">not yet set</div>
                                    </div>
                                </div>
                                <div class="details">CLICK FOR MORE DETAILS...</div>
                            </div>
                        </div>
                    </button>
                <?php endforeach; ?>
                <form class="add-recipe-form" action="add_recipe" method="POST">
                    <button class="add-recipe" type="submit">
                        <img class="icon" src="public/img/plus.svg"/>
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>

<template id="recipe-template">
    <button class="recipe">
        <img class="photo" src="">
        <div class="description">
            <div class="heading">
                <div class="title">title</div>
                <img class="time" src="public/img/clock.svg">
                <div class="text">temp-text</div>
            </div>
            <div class="body">
                <div class="used-ingredients">
                    <div class="text">Ingredients:</div>
                    <div class="ingredient">
                        <div class="name" id="ing1">not yet set</div>
                    </div>
                    <div class="ingredient">
                        <div class="name" id="ing2">not yet set</div>
                    </div>
                    <div class="ingredient">
                        <div class="name" id="ing3">not yet set</div>
                    </div>
                </div>
                <div class="details">CLICK FOR MORE DETAILS...</div>
            </div>
        </div>
    </button>
</template>