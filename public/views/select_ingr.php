<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/common2.css">
    <link rel="stylesheet" type="text/css" href="public/css/ingredients.css">
    <title>ingredients page</title>
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
                <input name="search" type="text" placeholder="SEARCH FOR RECIPE..."></input>
            </div>
            <div class="parting"></div>
            <div class="categories">
                <div class="meat">
                    <div class="heading">
                        <div class="name">
                            <div class="text">Meat</div>
                            <img class="meat-icon" src="public/img/meat.svg"></img>
                        </div>
                        <button>
                            <img class="minus-icon" src="public/img/minus.svg"></img>
                        </button>
                    </div>
                    <div class="ingredients">
                        <button class="food">ham</button>
                        <button class="food">bacon</button>
                        <button class="food">sausage</button>
                        <button class="food">chicken breast</button>
                        <button class="food">beef meet</button>
                        <button class="add">
                            <img class="plus-icon" src="public/img/plus.svg"></img>
                        </button>
                    </div>
                </div>
                <div class="dairy">
                    <div class="heading">
                        <div class="name">
                            <div class="text">Dairy products, eggs</div>
                            <img class="meat-icon" src="public/img/dairy.svg"></img>
                        </div>
                        <button>
                            <img class="minus-icon" src="public/img/minus.svg"></img>
                        </button>
                    </div>
                    <div class="ingredients">
                        <button class="food">milk</button>
                        <button class="food">eggs</button>
                        <button class="food">dairy cream</button>
                        <button class="food">white cheese</button>
                        <button class="food">cheese</button>
                        <button class="add">
                            <img class="plus-icon" src="public/img/plus.svg"></img>
                        </button>
                    </div>
                </div>
                <div class="vegetables">
                    <div class="heading">
                        <div class="name">
                            <div class="text">Vegetables</div>
                            <img class="meat-icon" src="public/img/vegetables.svg"></img>
                        </div>
                        <button>
                            <img class="minus-icon" src="public/img/minus.svg"></img>
                        </button>
                    </div>
                    <div class="ingredients">
                        <button class="food">carrot</button>
                        <button class="food">potato</button>
                        <button class="food">cucumber</button>
                        <button class="food">brocoli</button>
                        <button class="food">tomato</button>
                        <button class="food">corn</button>
                        <button class="food">onion</button>
                        <button class="food">red pepper</button>
                        <button class="food">lettuce</button>
                        <button class="food">garlic</button>
                        <button class="food">spinach</button>
                        <button class="add">
                            <img class="plus-icon" src="public/img/plus.svg"></img>
                        </button>
                    </div>
                </div>
                <div class="fruits">
                    <div class="heading">
                        <div class="name">
                            <div class="text">Fruits</div>
                            <img class="meat-icon" src="public/img/fruits.svg"></img>
                        </div>
                        <button>
                            <img class="minus-icon" src="public/img/minus.svg"></img>
                        </button>
                    </div>
                    <div class="ingredients">
                        <button class="food">apple</button>
                        <button class="food">orange</button>
                        <button class="food">banana</button>
                        <button class="food">pineapple</button>
                        <button class="food">pear</button>
                        <button class="food">mango</button>
                        <button class="food">watermelon</button>
                        <button class="add">
                            <img class="plus-icon" src="public/img/plus.svg"></img>
                        </button>
                    </div>
                </div>
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