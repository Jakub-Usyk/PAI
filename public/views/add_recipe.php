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
                <img class="placeholder" src="public/img/avatar-placeholder.svg"/>
            </a>
            <a class="ingr-select" href="select_ingr">
                <img class="ingr-icon" src="public/img/ingredients.svg"/>
                <div class="text">Select ingredients</div>
            </a>
            <a class="recipes" href="recipes">
                <img class="recipes-icon" src="public/img/recipes.svg"/>
                <div class="text">My recipes</div>
            </a>
            <a class="settings" href="settings">
                <img class="settings-icon" src="public/img/settings.svg"/>
                <div class="text">Settings</div>
            </a>
            <form class="logout-form" action="logout" method="POST">
                <button class="logout" type="submit">
                    <img class="logout-icon" src="public/img/logout.svg"/>
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
        