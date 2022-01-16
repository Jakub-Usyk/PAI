<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/common2.css">
    <link rel="stylesheet" type="text/css" href="public/css/recipes.css">
    <title>recipes page</title>
</head>

<body>
    <div class="container" style="height: 100vh">
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
            <div class="recipe-form">
                <form action="add_recipe" method="POST" ENCTYPE="multipart/form-data">
                    <?php if(isset($messages)) {
                        foreach ($messages as $message) {
                            echo $message;
                        }
                    }?>
                    <input name="title" type="text" placeholder="title">
                    <textarea name="description" rows="15" placeholder="description"></textarea>
                    <input name="time" type="text" placeholder="prepare time (in minutes)">
                    <input name="file" type="file" >
                    <button type="submit">Add</button>
                </form>
            </div>
        </div>
    </div>
</body>
        