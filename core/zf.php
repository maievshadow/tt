<?php
use zf\http as http;
use zf\mvc;
$route = new http\Route();

$controller = $route->getAction();
$action = $route->getAction();
$module = $route->getModule();

$module = 'index';
$controller = 'index';
$action = 'index';

if ($module == 'index'){
    include CONT_PATH . '/index.php';

    $controller = sprintf('%s%s', $controller, 'Controller');

    //can build with reflection
    $t = "zf\mvc\$controller";

    $c = new $t();
    if (method_exists($c, $action.'Action')) {
        call_user_func(array($c, $action.'Action'));
    }
}
