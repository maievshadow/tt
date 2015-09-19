<?php
$t = function ($name){
	echo $name;
}; //rember ;

function t1($name){
	echo $name;
}

class A{
	public function t(){
		echo '123';
	}
}
#call_user_func(function(){echo 23;}); //call anomonymos function
#call_user_func('t1', 'maiev'); //call t1
call_user_func($t, 'maiev');
$a = new A();
call_user_func(array($a, 'maiev'));

class myclass {
	static function say_hello() {
		echo "Hello!\n";
	}
}

$classname = "myclass";

call_user_func(array($classname, 'say_hello'));
call_user_func($classname .'::say_hello'); // As of 5.2.3

$myobject = new myclass();

call_user_func(array($myobject, 'say_hello'));

function getNameFunc() {
	$string = 'Denoncourt';
	return function() use ($string) { return $string; }; //attention use 
}
$name = getNameFunc();
$name();
assert ($name() == 'Denoncourt');
class Person {
	var $first;
	public function __call($method, $args) {
		return call_user_func_array( $this->$method, $args);
	}
}

$me = new Person();
$me->first = 'Don';
$me->sayGoodbye = function() use ($me) {
	return 'Bye '.$me->first;
};
assert($me->sayGoodbye() == 'Bye Don');
