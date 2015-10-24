<?php
namespace zf\http;
class Request
{
    public function get($var) {
       return $_GET[$var]; 
    }

    public function is_get() {
    }

    public function is_post() {
    }

    public function is_ajax() {
    }

    public function post() {
    }

    public function request() {
    }
	
	public function get_param($key) {
	}

	public function get_params() {
	}
}
