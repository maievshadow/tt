<?php
namespace zf\http;
class Response
{
    private $html; 

    private $status;
    public function __toString()
    {
    }

    public function set_header()
    {
    }
    public function set_response($html, $type='html')
    {
        header('HTTP/1.1 200 OK');
        header('Content-type:text/html');
        echo $html;
    }

    public function set_status()
    {
    }

    public function set_charset()
    {
    }

    public function set_contenttype()
    {
    }
}
