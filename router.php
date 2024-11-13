<?php
require_once 'libs/router.php';

require_once 'app/controllers/product.api.controller.php';
require_once 'app/controllers/categoria.api.controller.php';
require_once 'app/controllers/user.api.controller.php';
require_once 'app/middlewares/jwt.auth.middleware.php';

$router = new Router();

$router->addMiddleware(new JWTAuthMiddleware());

$router->addRoute('productos',     'GET',    'ProductApiController',   'getAllProducts');
$router->addRoute('productos/:id', 'GET',    'ProductApiController',   'getProduct');
$router->addRoute('productos/:id', 'DELETE', 'ProductApiController',  'deleteProduct');
$router->addRoute('productos',     'POST',   'ProductApiController',   'insertProduct');
$router->addRoute('productos/:id', 'PUT',    'ProductApiController',  'editProduct');


$router->addRoute('categorias', 'GET', 'CategoriaApiController', 'getCategorias');
$router->addRoute('categorias/:id', 'GET', 'CategoriaApiController', 'getCategoria');
$router->addRoute('categorias', 'POST', 'CategoriaApiController', 'insertarCategoria');

$router->addRoute('usuarios/token', 'GET', 'UserApiController', 'getToken');

$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);


