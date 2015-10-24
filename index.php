<?php
define("APP_PATH", dirname(__FILE__));
define('LIB_PATH',  APP_PATH . '/lib');
define('CORE_PATH',  APP_PATH . '/core');
define("VIEW_PATH", APP_PATH . '/view');
define("CONT_PATH", APP_PATH . '/controller');
define("CONFIG_PATH", APP_PATH . '/config');

include(LIB_PATH . '/cls_request.php');
include(LIB_PATH . '/cls_response.php');
include(LIB_PATH . '/cls_template.php');
include(LIB_PATH . '/cls_route.php');
include(LIB_PATH . '/cls_dispatch.php');
include(LIB_PATH . '/cls_controller.php');
//include(LIB_PATH . '/cls_common.php');


//路由分发dispatcher

use zf\http as http;
use zf\mvc;
$dispatcher = new http\Dispatch();

$controller = $dispatcher->getAction();
$action = $dispatcher->getAction();
$module = $dispatcher->getModule();
//$param = $dispatcher->getParam();

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




