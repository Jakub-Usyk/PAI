<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/common2.css">
    <link rel="stylesheet" type="text/css" href="public/css/settings.css">
    <title>settings page</title>
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
            <div class="text">Account settings</div>
            <div class="parting"></div>
            <div class="info">
                <button class="avatar">
                    <img class="placeholder" src="public/img/new-avatar.svg"></img>
                </button>
                <div class="fields-names">
                    <div class="name-field">Name</div>
                    <div class="surname-field">Surname</div> 
                    <div class="email-field">Email</div>
                </div>        
                <div class="fields-values">
                    <div class="name-field">
                        <div class="value" type="text"></div>
                        <button class="overwrite-button">
                            <img class="icon" src="public/img/overwrite.svg"></img>
                        </button>
                    </div>
                    <div class="surname-field">
                        <div class="value" type="text"></div>
                        <button class="overwrite-button">
                            <img class="icon" src="public/img/overwrite.svg"></img>
                        </button>
                    </div>
                    <div class="email-field">
                        <div class="value" type="text">email@email.com</div>
                        <button class="overwrite-button">
                            <img class="icon" src="public/img/overwrite.svg"></img>
                        </button>
                    </div>
                </div>
            </div>
            <div class="buttons">
                <div class="options">
                    <button class="change-password">Change password</button>
                    <button class="delete-account">Delete account</button>
                </div>
                <button class="save">Save</button>
            </div>
        </div>
    </div>
</body>
        