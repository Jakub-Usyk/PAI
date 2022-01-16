<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/common1.css">
    <link rel="stylesheet" type="text/css" href="public/css/login.css">
    <title>login page</title>
</head>
<body>
    <div class="container">
        <div class="form-panel">
            <img class="logo" src="public/img/logo.svg"></img>
            <form action="login" method="POST">
                <div class="message">
                    <?php if(isset($messages)) {
                        foreach ($messages as $message) {
                            echo $message;
                        }
                    }?>
                </div>
                <div class="username">
                    <img class="icon" src="public/img/username.svg"></img>
                    <input name="username" type="text" placeholder="USERNAME..."></input>
                </div>
                <div class="password">
                    <img class="icon" src="public/img/password.svg">
                    <input name="password" type="password" placeholder="PASSWORD..."></input>
                </div>
                <button class="button-login" type="submit">LOGIN</button>
                <div class="parting">
                    <div class="line"></div>
                    <div class="text">OR</div>
                    <div class="line"></div>
                </div>
                <a class="button-new-account" href="new_account">
                    <div class="text">CREATE NEW ACCOUNT</div>
                </a>
            </form>
        </div>
    </div>
</body>