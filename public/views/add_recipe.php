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
            <div class="recipe-form">
                <h1>UPLOAD</h1>
                <form action="add_recipe" method="POST" ENCTYPE="multipart/form-data">
                    <?php if(isset($messages)) {
                        foreach ($messages as $message) {
                            echo $message;
                        }
                    }?>
                    <input name="title" type="text" placeholder="title">
                    <textarea name="description" rows="15" placeholder="description"></textarea>
                    <input name="time" type="text" placeholder="prepare">
                    <input type="file" name="file">
                    <button type="submit">Add</button>
                </form>
            </div>
        </div>
    </div>
</body>
        