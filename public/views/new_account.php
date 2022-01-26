<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/common1.css">
    <link rel="stylesheet" type="text/css" href="public/css/new-account.css">
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <title>new account page</title>
</head>
<body>
    <div class="container">
        <div class="form-panel">
            <img class="logo" src="public/img/logo.svg"></img>
            <form action="new_account" method="POST" ENCTYPE="multipart/form-data">
                <?php if(isset($messages)) {
                    foreach ($messages as $message) {
                        echo $message;
                    }
                }?>
                <div class="username">
                    <img class="icon" src="public/img/username.svg"></img>
                    <input name="username" type="text" placeholder="USERNAME..."></input>
                </div>
                <div class="password">
                    <img class="icon" src="public/img/password.svg">
                    <input name="password" type="password" placeholder="PASSWORD..."></input>
                </div>
                <div class="password-retype">
                    <img class="icon" src="public/img/retype.svg">
                    <input name="password_retype" type="password" placeholder="RE-TYPE PASSWORD..."></input>
                </div>
                <div class="email">
                    <img class="icon" src="public/img/email.svg">
                    <input name="email" type="text" placeholder="EMAIL..."></input>
                </div>
                <button class="button-register" type="submit">REGISTER</button>
            </form>
        </div>
    </div>
</body>