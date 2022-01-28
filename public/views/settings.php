<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/common2.css">
    <link rel="stylesheet" type="text/css" href="public/css/settings.css">
    <script type="text/javascript" src="./public/js/changeValue.js" defer></script>
    <title>settings page</title>
</head>

<body>
    <div class="container">
        <div class="navi-bar">
            <a class="avatar" href="settings">
                <?php if ($user->getAvatar() == "")
                    echo "<img class=\"placeholder\" src=\"public/img/new-avatar.svg\">";
                else
                    echo "<img class=\"photo\" src=\"public/uploads/".$user->getAvatar()."\">";
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
            <div class="text">Account settings</div>
            <div class="parting"></div>
            <div class="info">
<!--                --><?php //die(var_dump($user)) ?>
                <form class="avatar-form" action="change_avatar" method="POST" ENCTYPE="multipart/form-data">
                    <button class="avatar">
                        <?php if ($user->getAvatar() == "")
                            echo "<img class=\"placeholder\" src=\"public/img/new-avatar.svg\">";
                        else
                            echo "<img class=\"photo\" src=\"public/uploads/".$user->getAvatar()."\">";
                        ?>
                    </button>
                    <input name="file" type="file">
                    <button class="avatar-submit" type="submit">Save</button>
                </form>
                <div class="fields-names">
                    <div class="name-field">Name</div>
                    <div class="surname-field">Surname</div>
                    <div class="email-field">Email</div>
                </div>
                <div class="fields-values">
                    <div class="name-field">
                        <div class="value" type="text"><?= $user->getName() ?></div>
                        <button class="overwrite-button">
                            <img class="icon" src="public/img/overwrite.svg"></img>
                        </button>
                    </div>
                    <div class="surname-field">
                        <div class="value" type="text"><?= $user->getSurname() ?></div>
                        <button class="overwrite-button">
                            <img class="icon" src="public/img/overwrite.svg"></img>
                        </button>
                    </div>
                    <div class="email-field">
<!--                        --><?php //die(var_dump($user->getEmail())) ?>
                        <div class="value" type="text"><?= $user->getEmail() ?></div>
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
        