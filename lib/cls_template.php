<?php
namespace zf\http;
class Template 
{
    public function render($html)
    {
        $content = file_get_contents($html);
        return $content;
        //return $html;
    }
}
