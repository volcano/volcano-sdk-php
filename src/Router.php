<?php

namespace VolcanoSDK;

class Router
{
    protected $_routeList;
    
    protected static $instance;
    
    public static function getInstance()
    {
        if (!isset(static::$instance)) {
            static::$instance = new static;
        }
        
        return static::$instance;
    }
    
    public function loadRoutes()
    {
        $this->_routeList = json_decode(
            file_get_contents(dirname(__FILE__) . '/../routes.json'),
            true
        );
    }
    
    public function getRoutes($serviceName)
    {
        if (!isset($this->_routeList)) {
            $this->loadRoutes();
        }
        
        if (isset($this->_routeList[$serviceName])) {
            return $this->_routeList[$serviceName];
        }
        
        return null;
    }
}