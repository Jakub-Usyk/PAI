<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('login', 'DefaultController');
Routing::get('new_account', 'DefaultController');
Routing::get('recipes', 'RecipeController');
Routing::get('select_ingr', 'DefaultController');
Routing::get('settings', 'DefaultController');

Routing::post('login', 'SecurityController');
Routing::post('new_account', 'SecurityController');
Routing::post('logout', 'SecurityController');
Routing::post('add_recipe', 'RecipeController');

Routing::run($path);