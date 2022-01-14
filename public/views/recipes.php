<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/common2.css">
    <link rel="stylesheet" type="text/css" href="public/css/recipes.css">
    <title>recipes page</title>
</head>

<body>
    <div class="container">
        <div class="navi-bar">
            <button class="avatar">
                <img class="placeholder" src="public/img/avatar-placeholder.svg"></img>
            </button>
            <button class="ingr-select">
                <img class="ingr-icon" src="public/img/ingredients.svg"></img>
                <div class="text">Select ingredients</div>
            </button>
            <button class="recipes">
                <img class="recipes-icon" src="public/img/recipes.svg"></img>
                <div class="text">My recipes</div>
            </button>
            <button class="settings">
                <img class="settings-icon" src="public/img/settings.svg"></img>
                <div class="text">Settings</div>
            </button>
            <button class="logout">
                <img class="logout-icon" src="public/img/logout.svg"></img>
                <div class="text">Logout</div>
            </button>
        </div>
        <div class="main-panel">
            <div class="search-bar">
                <img class="icon" src="public/img/search.svg">
                <input name="search" type="text" placeholder="SEARCH FOR RECIPE..."></input>
            </div>
            <div class="parting"></div>
            <div class="recipes">
                <button class="recipe">
                    <img class="photo" src="public/img/background.svg">
                    <div class="description">
                        <div class="heading">
                            <div class="title">Chicken on a pan</div>
                            <img class="time" src="public/img/clock.svg">
                            <div class="text">1h 15min</div>
                        </div>
                        <div class="body">
                            <div class="used-ingredients">
                                <div class="text">Ingredients:</div>
                                <div class="ingredient">
                                    <div class="dash">-</div>
                                    <div class="name">tomato</div>
                                    <div class="amount">3</div>
                                    <div class="unit">x</div>
                                </div>
                                <div class="ingredient">
                                    <div class="dash">-</div>
                                    <div class="name">cheeze</div>
                                    <div class="amount">200</div>
                                    <div class="unit">g</div>
                                </div>
                                <div class="ingredient">
                                    <div class="dash">-</div>
                                    <div class="name">chicken breast</div>
                                    <div class="amount">1</div>
                                    <div class="unit">x</div>
                                </div>
                            </div>
                            <div class="details">CLICK FOR MORE DETAILS...</div>
                        </div>
                    </div>
                </button>
                <button class="add-recipe">
                    <img class="icon" src="public/img/plus.svg"></img>
                </button>
            </div>
        </div>
    </div>
</body>
        