<?php
require_once 'libs/router.php';
require_once 'app/controllers/product.api.controller.php';
// require_once 'app/controllers/user.api.controller.php;
// require_once 'app/middlewares/jwt.auth.middleware.php;

$router = new Router();

// $router->addMiddleware(new JWTAuthMiddleware());

$router->addRoute('productos:id', 'GET', 'ProductApiController', 'get');
$router->addRoute('productos', 'POST', 'ProductApiController', 'insertProduct');

// $router->addRoute('usuarios/token', 'GET', 'UserApiController', 'getToken');

