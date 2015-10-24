<?php
namespace zf\mvc;
use zf\http as http;
abstract class Controller
{
	protected $request;
    protected $response;
    protected $template;

    public function __construct(){
        $this->template = new http\Template();
        $this->request = new http\Request();
        $this->response = new http\Response();
    }
}
