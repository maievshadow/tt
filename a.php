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

#$t = test();
#$t('qqq');

$a = array(1,2);
$b = array( 2=> 3, 3=> 4);

$c = $a + $b;
$d = array_merge($a, $b);
$e = array_merge($b, $a);

var_dump($c, $d, $e);exit;
