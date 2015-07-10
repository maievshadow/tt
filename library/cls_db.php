<?php
abstract class db
{
	protected $_link;
	protected $_config;
	protected $_sql;

	protected $_err;
	
	public function __construct($config) {
		$this->_config = $config;
	}

	public function show_err(){
		print $this->_err;
	}

	public function set_err($err){
		$this->_err = $err;
	}

	abstract public function connect();
	abstract public function fetchAll();
	abstract public function fetchOne();
	abstract public function fetchRow();

	abstract public function exec();
	abstract public function close();
}

class db_mysql extends db
{
	public function __construct($config) {
		$this->_err = 'qqqqq';
		parent::__construct($config);
	}

	public function connect(){
		$this->show_err();
	}

	public function fetchAll(){
	}

	public function fetchOne(){
	}

	public function fetchRow(){
	}

	public function exec() {
	}

	public function close() {
	}
}

class db_odbc extends db
{
	public function connect(){
		return 'odbc connect..';
	}

	public function fetchAll(){
	}

	public function fetchOne(){
	}

	public function fetchRow(){
	}

	public function exec() {
	}

	public function close() {
	}
}

class db_factory
{
	public static $_db;

	public static function create($type, $config){
		if ('mysql' == $type) {
			return self::$_db = new db_mysql($config);
		}else{
			return self::$_db = new db_odbc($config);
		}
	}
}

$config = array(
	'username' => 'zf',
	'password' => '',
	'db' => 'user',
	'port' => '3660'
);

$db = db_factory::create('odbc', $config);
$db->connect();

var_dump($db);
