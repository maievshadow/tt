<?php
define("APP_PATH", dirname(__FILE__));
define('LIB_PATH',  APP_PATH . '/lib');
#define('CORE_PATH',  APP_PATH . '/core');
define("VIEW_PATH", APP_PATH . '/view');
define("CONT_PATH", APP_PATH . '/controller');
define("CONFIG_PATH", APP_PATH . '/config');
define('CONSTANT', APP_PATH . '/constant');

//#function lib can
lib(LIB_PATH);
include CORE_PATH .'zf.php';

//路由分发route
function lib($path){
    $dir = opendir($path);
    while(false !== ($file = readdir($dir))){
        if ($file != '.' && $file != '..'){
            include($file);
        }
    }
}

