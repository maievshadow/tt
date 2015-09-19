<?php
//two namespace
namespace std{
	function ss(){
		return '123';
	}

	class A{
		public function __construct(){
			echo 'std A is running..';
		}
	}

	/*
	** the will occurs a error that namespace will not be  nested..
	namespace test{
		class A{
			public function __construct(){
				echo 'std\test A is running..';
			}
		}
	}
	*/
} //; will error;

 //this is a good style...
namespace std\test{
	class A{
		public function __construct(){
			echo 'std\test A is running..';
		}
	}
}

namespace test{
	require 'c.php'; //can be require/include files....
	class A{
		public function __construct(){
			echo 'test A is running..';
		}
	}

	$a = new \A();
	echo "\n";
	$a = new \test\A();
	echo "\n";
	$a = new A();
	echo "\n";
	$a = new \std\A();
	echo "\n";
	$a = new \std\test\A();
}

