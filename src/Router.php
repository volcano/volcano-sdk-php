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
        $this->_routeList = include dirname(__FILE__) . '/../routes.php';
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