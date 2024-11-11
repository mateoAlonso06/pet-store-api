<?php
require_once 'libs/router.php';
require_once 'app/controllers/product.api.controller.php';
// require_once 'app/controllers/user.api.controller.php;
// require_once 'app/middlewares/jwt.auth.middleware.php;

$router = new Router();

// $router->addMiddleware(new JWTAuthMiddleware());
                //endpoint         verbo      controller               metodo
$router->addRoute('productos',     'GET',    'ProductApiController',   'getAllProducts');
$router->addRoute('productos/:id', 'GET',    'ProductApiController',   'getProduct');
$router->addRoute('productos/:id', 'DELETE', 'ProductoApiController',  'deleteProduct');
$router->addRoute('productos',     'POST',   'ProductApiController',   'insertProduct');
$router->addRoute('productos/:id', 'PUT',    'ProductoApiController',  'editProduct');


// $router->addRoute('usuarios/token', 'GET', 'UserApiController', 'getToken');

