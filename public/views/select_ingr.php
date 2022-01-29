<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/common2.css">
    <link rel="stylesheet" type="text/css" href="public/css/ingredients.css">
    <title>ingredients page</title>
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
            <a class="recipes" href="recipes">
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
                <input name="search" type="text" placeholder="SEARCH FOR INGREDIENTS..."></input>
            </div>
            <div class="parting"></div>
            <div class="categories">
                <?php foreach ($tab['allCategories'] as $category): ?>
                <div class="category">
                    <div class="heading">
                        <div class="name">
                            <div class="text"><?= $category->getName() ?></div>
                            <img class="food-icon" src="public/img/<?= $category->getIcon() ?>"/>
                        </div>
                    </div>
                    <div class="ingredients">
                        <?php foreach ($category->getIngredients() as $ingredient): ?>
                        <button class="food"><?= $ingredient ?></button>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <button class="new-category">
                <img class="plus-icon" src="public/img/plus.svg"></img>
                <div class="text">Add new category</div>
            </button>
            <button class="show-results">
                <div class="text">SHOW POSSIBLE RECIPES</div>
            </button>
        </div>
    </div>
</body>