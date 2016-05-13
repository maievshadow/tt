<?php

namespace App\Services;

interface Message
{
    public function send();
}

class MessageService implements Message
{
    private $content;
    public function __construct($a)
    {
        $this->content = $a;
    }
    public function send()
    {
        return 'send mobile for code' .$this->content;
    }
}

class MessageService2 implements Message
{
    private $content;
    public function __construct($a)
    {
        $this->content = $a;
    }
    public function send()
    {
        return 'send mobile for code' .$this->content;
    }
}
