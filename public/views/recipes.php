<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/common2.css">
    <link rel="stylesheet" type="text/css" href="public/css/recipes.css">
    <title>recipes page</title>
</head>

<body>
    <div class="container">
        <div class="navi-bar">
            <a class="avatar" href="settings">
                <img class="placeholder" src="public/img/avatar-placeholder.svg"></img>
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
            <a class="logout" href="login">
                <img class="logout-icon" src="public/img/logout.svg"></img>
                <div class="text">Logout</div>
            </a>
        </div>
        <div class="main-panel">
            <div class="search-bar">
                <img class="icon" src="public/img/search.svg">
                <input name="search" type="text" placeholder="SEARCH FOR RECIPE..."/>
            </div>
            <div class="parting"></div>
            <div class="recipes">
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
                                    <div class="name">tomato</div>
                                </div>
                            </div>
                            <div class="details">CLICK FOR MORE DETAILS...</div>
                        </div>
                    </div>
                </button>
                <button class="add-recipe">
                    <img class="icon" src="public/img/plus.svg"/>
                </button>
            </div>
        </div>
    </div>
</body>
        