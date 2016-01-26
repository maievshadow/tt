<?php
/**
 * @author MAIEV
 * @descript 
 * @package     
 * @date 2015/01/26
 */
class Maiev_Redis implements Maiev_Cache
{
    private $_redis;

    private $_config = array(
        'host' => 'localhost',
        'port' => '65365'
    );
    /**
     * connect redis
     */
    public function __construct($config = array())
    {
        $this->_redis = new Redis();
        array_merge($this->_config, $config);
        $this->_redis->connect($this->_config['host'], $this->_config['port']);
    }

    /**
     * ping the redis-server
     */
     public function ping()
    {
        return $this->_redis->ping();
    }

    /**
     * return all cache keys
     */
    public function keys()
    {
        return $this->_redis->keys('*');
    }

    /**
     * exists key ?
     */
    public function exist($key)
    {
        return $this->_redis->exists($key);
    }

    /**
     * get the key 
     */
    public function get($key)
    {
        $this->_redis->get($key);
    }

    /**
     * save the key
     */
    public function save($key, $value ,$ttl = 3600)
    {
    }

    /**
     * delete the key
     */
    public function delete($key)
    {
    }

    /**
     * clean all the key
     */
    public function  clean()
    {
    }

    public function __destruct()
    {
    }
}

