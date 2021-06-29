<?php


require('./controllers/ArticleController.php');
require('./controllers/BrandController.php');
require('./controllers/LoginController.php');

//DEMO USAGE

$arcon = new ArticleController();
$brandcon = new BrandController();

var_dump($arcon->getAll());
var_dump($brandcon->getById(2));
var_dump($brandcon->getIdByName('Apple'));

echo('-> Correct login Demo -> ');
$usercon = new LoginController();
var_dump($usercon->loginUser('administrador', '123456'));
