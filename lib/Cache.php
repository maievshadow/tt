<?php
interface Maiev_Cache
{
    function save($key, $value, $ttl);
    function delete($key);
    function get($key);
    function clean();
}
