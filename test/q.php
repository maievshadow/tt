<?php
$arr = array(1,2,3,4,5,5);

$str = "<?php\r\n";
$str .= '$a=';
$str .= var_export($arr, true);
$str .= ";\r\n;";
$str .= 'var_dump($a);';
file_put_contents('t2.php', $str);
