<?php
$a = function($callback) {
    call_user_func($callback);
};

$a(function(){
    echo 1;
});

function test(){
    $a = 1;
    return function($_a) use($a){
        print $_a ."_and_". $a;
        echo PHP_EOL;
    };
}

$t = test();
$t('qqq');
