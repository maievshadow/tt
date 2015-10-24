<?php
namespace zf\http;
class Dispatch
{
	private $_request;

	public function __construct() {
        $this->_request = new http\Request();
	}

    public function getModule() {
		$module = $this->$_request->getModule();
		return 'index';
    }

    public function getAction(){
		$action = $this->$_request->getAction();
		return 'index';
    }

	//can remove
    public function getParam(){
		//$param = $this->$_request->getParam();
    }

	//can remove
	public function getParams(){
		//$param = $this->$_request->getParam();

		//return $param;
	}
}
